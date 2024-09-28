<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Models\Course;
use App\Models\Models\Student;
use App\Models\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::with('courses')->get();
        return view('teacher.index', compact('teacher'));

    }

    public function show($id)
    {
        $teachers = Teacher::with('courses')->findOrFail($id);
        return view('teacher.show', compact('teachers'));

    }
    public function create()
    {
        return view('teacher.create');
    }

    public function save(Request $request)
    {
        // Create a new Teacher
        Teacher::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'address_en' => $request->address_en,
            'address_ar' => $request->address_ar,
            'mobile' => $request->mobile,
        ]);

        // Redirect with a success message
        return redirect()->route('teacher.index')->with('message', "Created Successfully");
    }
    public function delete($id)
    {
        Teacher::findOrFail($id)->delete();
        return redirect()->route("teacher.index")->with("message", "Deleted Successfully");
    }
    public function edit($id)
    {
        $teachers = Teacher::findOrFail($id);
        return view("teacher.edit", compact("teachers"));
    }
    public function update(Request $request, $id)
    {
        Teacher::findOrFail($id)->update([
            "id" => $request->id,
            "name" => $request->name,
            "address" => $request->address,
            "mobile" => $request->mobile,
        ]);
        return redirect()->route("teacher.index")->with("message", "Updated Successfully");
    }

    public function courses()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('teacher.course', compact('courses', 'teachers'));
    }
    public function save_course(Request $request)
    {
        $data = [
            'name_en' => $request['teacher'],
            'courses' => $request['courses'],
        ];
        $teacher = Teacher::where('name_en', $data['name_en'])->first();
        foreach ($request->courses as $courses) {
            $course = Course::where('name', $courses)->first();
            $teacher->courses()->attach($course);
        }
        return redirect()->route("teacher.index");
    }
    public function show_course($course)
    {
        $course = Course::where('name', $course)->first();
        $students = $course->students()->get();
        return view('teacher.show-course', compact("students"));
    }

    public function grades($id)
    {
        $teacher = Teacher::with('courses')->find($id);
        return view('teacher.grade', compact('teacher', 'id'));
    }
    public function grades_con(Request $request)
    {
        $teacher_id = $request->id;
        $course_id = $request->courses;

        $course = Course::findOrFail($course_id);
        $students = $course->students()->get();

        return view('teacher.grade-continue', compact('teacher_id', 'students', 'course_id'));
    }
    public function grades_save(Request $request)
    {
        $student_id = $request->student;
        $course_id = $request->course_id;
        $grade = $request->grade;
        $student = Student::findOrFail($student_id);
        $Course = Course::findOrFail($course_id);
        $grade = Grade::create([
            'student_id' => $student_id,
            'course_id' => $course_id,
            'grade' => $grade,
        ]);
        $student->grades()->attach($grade->id);
        $Course->grades()->attach($grade->id);
        return redirect()->route("teacher.index");

    }
    public function grades_teacher()
    {
        $teachers = Teacher::with('courses.grades')->get();
        return view('teacher.grades-teacher', compact('teachers'));
    }
}
