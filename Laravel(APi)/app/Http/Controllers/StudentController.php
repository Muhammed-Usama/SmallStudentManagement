<?php

namespace App\Http\Controllers;

use App\Console\Commands\Courses;
use App\Models\Models\Student;
use App\Models\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('courses')->get();
        return view('student.index', compact('students'));

    }

    public function show($id)
    {
        $students = Student::with('courses')->findOrFail($id);
        return view('student.show', compact('students'));

    }
    public function create()
    {
        $courses = Course::all();
        return view('student.create', compact('courses'));
    }
    public function save(Request $request)
    {
        // Create a new student
        $student = Student::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'address_en' => $request->address_en,
            'address_ar' => $request->address_ar,
            'mobile' => $request->mobile,
            'email' => $request->email,
        ]);
        foreach ($request->courses as $courses) {
            $course = Course::where('name', $courses)->first();
            $student->courses()->attach($course);
        }
        // Redirect with a success message
        return redirect()->route('student.index')->with('message', "Created Successfully");
    }
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->courses()->detach();
        $student->grades()->detach();
        $student->delete();
        return redirect()->route("student.index")->with("message", "Deleted Successfully");
    }
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        return view("student.edit", compact("students"));
    }
    public function update(Request $request, $id)
    {
        Student::findOrFail($id)->update([
            "id" => $request->id,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'address_en' => $request->address_en,
            'address_ar' => $request->address_ar,
            'mobile' => $request->mobile,
        ]);
        return redirect()->route("student")->with("message", "Updated Successfully");
    }

}
