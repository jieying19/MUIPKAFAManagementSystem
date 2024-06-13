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
        $kafaActivity = ManageActivityEntity::all();
        $studentCounts = [];
        
        foreach ($kafaActivity as $activity) {
            $studentCount = Attendance::where('activity_id', $activity->id)
                ->select('student_id')
                ->distinct()
                ->count('student_id');
            $studentCounts[$activity->id] = $studentCount; // Store count for each activity ID
        }
    
        return view('ManageKafaActivity.kafaActivityList', compact('kafaActivity', 'studentCounts'));
    }
    
    

    public function kafaActivityList()
    {
        $kafaActivity = ManageActivityEntity::all();

        return view('ManageKafaActivity.kafaActivityList', compact('kafaActivity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ManageKafaActivity.addKafaActivityForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required',
            'activity_studentAge' => 'required',
            ]);
        // dd($request);
        ManageActivityEntity::create($request->all());
    
        return redirect()->route('kafaActivity')->with('success', 'Activity added successfully');
    }

    public function storeAttendance(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'activity_id' => 'required',
            ]);
        Attendance::create($request->all());        
    
        return redirect()->route('kafaActivity')->with('success', 'Activity added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $kafaActivity = ManageActivityEntity::find($id);

    $attendances = Attendance::where('activity_id', $kafaActivity->id)->get();

    // $allAttendances = Attendance::all();
    // dd($allAttendances);
    $students = Student::where('id', auth()->user()->id)->get(); // Assuming parent_id links students to parents
    return view('ManageKafaActivity.viewKafaActivityForm', compact('kafaActivity', 'students', 'attendances'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kafaActivity = ManageActivityEntity::find($id);
        return view('ManageKafaActivity.editKafaActivityForm', compact('kafaActivity'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        // Retrieve the existing record by its ID
        $kafaActivity = ManageActivityEntity::findOrFail($id);

        // Validate the incoming request
        $request->validate([
          'activity_name' => 'required',
            'activity_studentAge' => 'required|integer|min:1|max:120',
        ]);

        // Update the record with the new data
        $kafaActivity->update($request->all());
        return redirect()->route('kafaActivity')->with('success', 'Activity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kafaActivity = ManageActivityEntity::find($id);
        $kafaActivity->delete();
        return redirect()->route('kafaActivity')->with('success', 'Activity deleted successfully');
    }
}
