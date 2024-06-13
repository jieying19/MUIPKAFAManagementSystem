<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function index(){
        $StudentResult = User::all(); // or whatever query you need
        return view('ManageStudentResult.StudentResultList', compact("StudentResult"));
    }
}
