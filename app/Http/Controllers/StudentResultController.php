<?php

namespace App\Http\Controllers;

use App\Models\StudentResult;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function studentResultList()
    {
        $results = StudentResult::all();
        return view('studentResults.student_result_list', compact('results'));
    }

    public function viewStudentResultPage($id)
    {
        $result = StudentResult::findOrFail($id);
        return view('studentResults.view_student_result', compact('result'));
    }

    public function addStudentResultPage()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('studentResults.add_student_result', compact('students', 'subjects'));
    }

    public function storeStudentResult(Request $request)
    {
        $data = $request->validate([
            'subject_code' => 'required|integer',
            'subject_name' => 'required|string|max:50',
            'subject_mark' => 'required|integer',
            'subject_grade' => 'required|string|max:10',
            'academic_session' => 'required|string|max:10',
            'attendance' => 'required|integer',
            'classname' => 'required|string|max:20',
            'overall_marks' => 'required|integer',
            'result_percentage' => 'required|integer',
            'result_status' => 'required|string|max:10',
            'result_comment' => 'nullable|string|max:255',
            'student_id' => 'required|integer|exists:students,id',
        ]);

        StudentResult::create($data);

        return redirect()->route('studentResultList')->with('message', 'Student result added successfully!');
    }

    public function editStudentResultPage($id)
    {
        $result = StudentResult::findOrFail($id);
        $students = Student::all();
        $subjects = Subject::all();
        return view('studentResults.edit_student_result', compact('result', 'students', 'subjects'));
    }

    public function updateStudentResult(Request $request, $id)
    {
        $data = $request->validate([
            'subject_code' => 'required|integer',
            'subject_name' => 'required|string|max:50',
            'subject_mark' => 'required|integer',
            'subject_grade' => 'required|string|max:10',
            'academic_session' => 'required|string|max:10',
            'attendance' => 'required|integer',
            'classname' => 'required|string|max:20',
            'overall_marks' => 'required|integer',
            'result_percentage' => 'required|integer',
            'result_status' => 'required|string|max:10',
            'result_comment' => 'nullable|string|max:255',
            'student_id' => 'required|integer|exists:students,id',
        ]);

        $result = StudentResult::findOrFail($id);
        $result->update($data);

        return redirect()->route('studentResultList')->with('message', 'Student result updated successfully!');
    }

    public function deleteStudentResult($id)
    {
        $result = StudentResult::findOrFail($id);
        $result->delete();

        return redirect()->route('studentResultList')->with('message', 'Student result deleted successfully!');
    }

    public function viewStudentReportPage()
    {
        $results = StudentResult::all();
        // Generate CSV or PDF here
        return view('studentResults.view_student_report', compact('results'));
    }
}
