<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function index()
    {
        return view('ManageKafaActivity.kafaActivityList',compact("kafaActivity"));
    }
}
