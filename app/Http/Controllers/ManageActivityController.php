<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\ManageActivityEntity;
use App\Models\Student;
use Illuminate\Http\Request;

class ManageActivityController extends Controller
{
    public function index()
    {
        $kafaActivity = ManageActivityEntity::all(); //Fetches all activities from ManageActivityEntity
        $studentCounts = [];
        
        foreach ($kafaActivity as $activity) {
            $studentCount = Attendance::where('activity_id', $activity->id) //Only retrieve selected activity 
                ->select('student_id') 
                ->distinct()
                ->count('student_id'); //count the student number 
            $studentCounts[$activity->id] = $studentCount; // Store count for each activity ID
        }
    
        return view('ManageKafaActivity.kafaActivityList', compact('kafaActivity', 'studentCounts'));
    }
    
    

    public function kafaActivityList() // Retrieve and display all activities 
    {
        $kafaActivity = ManageActivityEntity::all();

        return view('ManageKafaActivity.kafaActivityList', compact('kafaActivity'));
    }



    public function create() //Show the form for creating a new resource
    {
        return view('ManageKafaActivity.addKafaActivityForm');
    }



    public function store(Request $request) //Store a newly created resource in storage
    {
        $request->validate([
            'activity_name' => 'required',
            'activity_studentAge' => 'required',
            ]);

        ManageActivityEntity::create($request->all());
    
        return redirect()->route('kafaActivity')->with('success', 'Activity added successfully');
    }



    public function storeAttendance(Request $request, $id) //Store a new attendance record for the selected activity
    {
        $request->validate([
            'student_id' => 'required',
            'activity_id' => 'required',
            ]);

        Attendance::create($request->all());        
    
        return redirect()->route('kafaActivity')->with('success', 'Activity added successfully');
    }

    

    public function show($id) //Display the specified activity along with its attendance and related students.
    {
        $kafaActivity = ManageActivityEntity::find($id);

        $attendances = Attendance::where('activity_id', $kafaActivity->id)->get();

        $students = Student::where('id', auth()->user()->id)->get(); // Assuming parent_id links students to parents
        return view('ManageKafaActivity.viewKafaActivityForm', compact('kafaActivity', 'students', 'attendances'));
    }



    public function edit($id) //Show the form to edit an existing activity
    {
        $kafaActivity = ManageActivityEntity::find($id);
        return view('ManageKafaActivity.editKafaActivityForm', compact('kafaActivity'));
    }


    
    public function update(Request $request, $id) //Update the specified resource in storage.
    {
        // Retrieve the existing record by its ID
        $kafaActivity = ManageActivityEntity::findOrFail($id);

        // Validate the incoming request
        $request->validate([
          'activity_name' => 'required',
            'activity_studentAge' => 'required|integer|min:1|max:120',
        ]);

        // Update the specified activity with the new data
        $kafaActivity->update($request->all());
        return redirect()->route('kafaActivity')->with('success', 'Activity updated successfully');
    }


    
    public function destroy($id) //Remove the specified activity from database
    {
        $kafaActivity = ManageActivityEntity::find($id);
        $kafaActivity->delete();
        return redirect()->route('kafaActivity')->with('success', 'Activity deleted successfully');
    }
}
