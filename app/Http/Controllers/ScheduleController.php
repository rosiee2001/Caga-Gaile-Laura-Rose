<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ListStudents;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showStudentInfo()
    {
        $students = ListStudents::with('schedules')->get();
    
        return view('layouts.add', compact('students'));
    }


}
