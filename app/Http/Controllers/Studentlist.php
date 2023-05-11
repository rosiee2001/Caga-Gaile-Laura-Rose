<?php

namespace App\Http\Controllers;

use App\Models\ListStudents;
use Illuminate\Http\Request;

class Studentlist extends Controller
{
    public function index()
    {
        $students = ListStudents::all();
        return view('layouts.add', compact('students'));
    }

    public function create()
    {
        return view('liststudents.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'FirstName' => 'required',
            'MiddleName' => 'nullable',
            'LastName' => 'required',
            'Extension' => 'nullable',
            'Gender' => 'required',
            'DateofBirth' => 'required|date',
            'Civilstatus' => 'required',
         

        ]);

        // Create new liststudents record
        $liststudents = new liststudents;
        $liststudents->FirstName = $request->input('FirstName');
        $liststudents->MiddleName = $request->input('MiddleName');
        $liststudents->LastName = $request->input('LastName');
        $liststudents->Extension = $request->input('Extension');
        $liststudents->Gender = $request->input('Gender');
        $liststudents->DateofBirth = $request->input('DateofBirth');
        $liststudents->Civilstatus = $request->input('Civilstatus');

        $liststudents->save();

        // Redirect to liststudents index page with success message
        return redirect()->route('liststudents.index')->with('success', ' Students Added Successfully.');
    }

    public function edit($id)
    {
        $student = ListStudents::findOrFail($id);
        return view('liststudents.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'FirstName' => 'required|max:255',
            'MiddleName' => 'nullable|max:255',
            'LastName' => 'required|max:255',
            'Extension' => 'nullable|max:10',
            'Gender' => 'required',
            'DateofBirth' => 'required|date',
            'Civilstatus' => 'required',
        ]);
    
        // Find the student by ID
        $liststudents = ListStudents::findOrFail($id);
    
        // Update the student details
        $liststudents  ->FirstName = $request->input('FirstName');
        $liststudents ->MiddleName = $request->input('MiddleName');
        $liststudents ->LastName = $request->input('LastName');
        $liststudents ->Extension = $request->input('Extension');
        $liststudents ->Gender = $request->input('Gender');
        $liststudents ->DateofBirth = $request->input('DateofBirth');
        $liststudents ->Civilstatus = $request->input('Civilstatus');
        $liststudents ->save();
    
        // Redirect to the student list page with success message
        return redirect()->route('liststudents.index')->with('success', 'Student details updated successfully.');
    }
    
    public function destroy($id)
    {
        $student = ListStudents::findOrFail($id);
        $student->delete();

        return redirect()->route('liststudents.index')->with('success', ' Students Removed Successfully.');
    }

}
