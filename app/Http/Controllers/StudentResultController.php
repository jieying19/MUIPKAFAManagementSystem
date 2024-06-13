<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentResultController extends Controller
{
    public function viewStudentResult()
    {
        //retrieve student name and class for result view
        $studentID = 100;
        $student = DB::table('classes')
            ->select('studentName', 'className')
            ->where('studentID', $studentID)
            ->first();

        //retrieve results mark and grade for each subject
        $results = DB::table('results')
            ->join('subjects', 'results.subjectID', '=', 'subjects.subjectID')
            ->select('subjects.subjectName', 'subjects.subjectExamDate', 'results.resultMark', 'results.resultGrade')
            ->where('results.studentID', $studentID)
            ->get();

        return view('ManageStudentResult.StudentResultPage', compact('student', 'results'));
    }

    public function viewSubjectList()
    {
        //retrieve subjects data from db (subjects table) & display it in SubjectList page
        $subjects = DB::table('subjects')->select('subjectID', 'subjectName', 'subjectExamDate')->paginate(10);

        $resultID = DB::table('results')->select('resultID', 'resultMark', 'resultGrade');
        return view('manageStudentResult.SubjectList', compact('subjects'));
    }

    public function newCourse()
    {
        //retrieve new subject added in subject list
        return view('manageStudentResult.AddSubject');
    }

    public function storeNewCourse(Request $request)
    {
        // Log the request data for debugging
        Log::info('Request data:', $request->all());

        //Validate request data to add
        $request->validate([
            'subjectName' => 'required|string|max:255',
            'subjectExamDate' => 'required|date',
        ]);

        //Insert new subject into db
        DB::table('subjects')->insert([
            'subjectName' => $request->input('subjectName'),
            'subjectExamDate' => $request->input('subjectExamDate'),
        ]);

        //Redirect to the all course list page with success message
        return redirect()->route('ManageStudentResult.viewSubjectList')
            ->with('success', 'New Course added successfully!');
    }

    public function deleteCourse($id)
    {    
        $subject = DB::table('subjects')->where('subjectID', $id)->first();

        //check if the course exists or not
        if (!$subject) {
            return redirect()->route('ManageStudentResult.viewSubjectList')->with('error', 'Subject not available');
        }

        // Delete the course record from the courses list
        DB::table('subjects')->where('subjectID', $id)->delete();

        // Redirect to the viewSubjectList route with a success message
        return redirect()->route('ManageStudentResult.viewSubjectList')->with('success', 'The selected subject deleted successfully');
    }

    public function addResult(Request $request)
    {
        // Debugging: Check what data is being submitted
        Log::info('Request data:', $request->all());

        // Validate request
        $request->validate([
            'resultMark' => 'required|array',
            'resultMark.*' => 'required|integer',
            'resultGrade' => 'required|array',
            'resultGrade.*' => 'required|string',
            'subjectID' => 'required|integer',
        ]);

        // Get the selected subjectID from the request
        $subjectID = $request->input('subjectID');

        // Loop through each student's result
        foreach ($request->resultMark as $studentID => $resultMark) {
            $resultGrade = $request->resultGrade[$studentID];

            // Insert the result into the database
            DB::table('results')->insert([
                'studentID' => $studentID,
                'subjectID' => $subjectID,
                'resultMark' => $resultMark,
                'resultGrade' => $resultGrade,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Redirect back to the course list page with success message
        return redirect()->route('ManageStudentResult.viewSubjectList')
            ->with('success', 'Data saved successfully!');
    }

    public function viewStudentList(Request $request)
    {
        // Retrieve distinct classes for the selection dropdown
        $classes = DB::table('classes')->select('className')->distinct()->get();

        // Retrieve the subjectID from the request
        $subjectID = $request->query('subjectID');

        // Fetch the subjectName based on subjectID
        $subjectName = null;
        if ($subjectID) {
            $subject = DB::table('subjects')->where('subjectID', $subjectID)->first();
            if ($subject) {
                $subjectName = $subject->subjectName;
            }
        }
        // Fetch students based on selected class
        if ($request->has('classID') && $request->classID) {
            $filteredClass = DB::table('classes')
                ->select('studentID', 'studentName', 'className')
                ->where('className', $request->classID)
                ->get();

            return view('ManageStudentResult.AddStudentResult')
                ->with('classes', $classes)
                ->with('filteredClass', $filteredClass)
                ->with('subjectName', $subjectName); // Pass subjectName to the view
        }
        return view('ManageStudentResult.AddStudentResult', compact('classes', 'subjectName'));
    }

   

    public function editResult(Request $request)
    {
        // Retrieve distinct class names from the classes table
        $classes = DB::table('classes')->select('className')->distinct()->get();
        $subjectID = $request->query('subjectID');
        $subjectName = null;

        if ($subjectID) {
            // Retrieve the subject record with the given subjectID from the subjects table
            $subject = DB::table('subjects')->where('subjectID', $subjectID)->first();
            if ($subject) {
                $subjectName = $subject->subjectName;
            }
        }

        $filteredClass = collect();

        if ($request->has('classID') && $request->classID) {
            // Fetch data for the selected class
            $filteredClass = DB::table('classes')
                ->leftJoin('results', 'classes.studentID', '=', 'results.studentID')
                ->select('classes.studentID', 'classes.studentName', 'classes.className', 'results.resultID', 'results.resultMark', 'results.resultGrade')
                ->where('classes.className', $request->classID)
                ->where('results.subjectID', $subjectID)
                ->get();
        } else {
            // Fetch data for all classes
            $filteredClass = DB::table('classes')
                ->leftJoin('results', 'classes.studentID', '=', 'results.studentID')
                ->select('classes.studentID', 'classes.studentName', 'classes.className', 'results.resultID', 'results.resultMark', 'results.resultGrade')
                ->where('results.subjectID', $subjectID)
                ->get();
        }
        return view('ManageStudentResult.EditStudentResult', compact('classes', 'filteredClass', 'subjectName', 'subjectID'));
    }

    public function uploadResult(Request $request)
    {
        // Debugging: Check what data is being submitted
        Log::info('Request data:', $request->all());

        // Validate request
        $request->validate([
            'resultMark' => 'required|array',
            'resultMark.*' => 'required|integer',
            'resultGrade' => 'required|array',
            'resultGrade.*' => 'required|string',
            'subjectID' => 'required|integer',
        ]);

        // Get the selected subjectID from the request
        $subjectID = $request->input('subjectID');

        // Loop through each student's result
        foreach ($request->resultMark as $studentID => $resultMark) {
            $resultGrade = $request->resultGrade[$studentID];
            $resultID = $request->resultID[$studentID];

            // Update the result in the database  
            DB::table('results')
                ->where('resultID', $resultID)
                ->update([
                    'resultMark' => $resultMark,
                    'resultGrade' => $resultGrade,
                    'updated_at' => now(),
                ]);
        }
        return redirect()->route('ManageStudentResult.viewSubjectList')
            ->with('success', 'Data updated successfully!');
    }
}