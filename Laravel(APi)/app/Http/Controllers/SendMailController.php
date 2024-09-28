<?php

namespace App\Http\Controllers;

use App\Mail\SendGrades;
use App\Mail\SendMail;
use App\Mail\SendMailWithFile;
use App\Models\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //
    public function sendtext(Request $request)
    {

        $name = $request->name;
        $To = $request->to;
        $form = $request->form;

        Mail::to($To)->send(new SendMail(compact('name', 'form')));
        return response()->json([
            'status' => 200,
            'msg' => 'Email Sent Successfully'
        ]);


    }
    public function sendfile(Request $request)
    {
        $name = $request->name;
        $To = $request->to;
        $form = $request->form;
        $path = $request->file('path')->store('apifile');
        $as = $request->as;
        Mail::to($To)->send(new SendMailWithFile(compact('name', 'form', 'path', 'as')));
        return response()->json([
            'status' => 200,
            'msg' => 'Email Sent Successfully'
        ]);

    }
    public function sendGrades()
    {
        // Retrieve all students with their grades and associated courses
        $students = Student::with('grades.courses')->get();

        foreach ($students as $student) {
            $studentName = $student->name_en;
            $studentEmail = $student->email;
            $gradesData = []; // Initialize gradesData

            // Collect all grades and corresponding courses for the student
            foreach ($student->grades as $grade) {
                foreach ($grade->courses as $course) {
                    $gradesData[] = [
                        'course_name' => $course->name,
                        'grade_value' => $grade->grade,
                    ];
                }
            }

            // Send email with the collected data
            Mail::to($studentEmail)->send(new SendGrades(compact('gradesData', 'studentName')));
        }

        return response()->json(['message' => 'Grades processed and sent successfully']);
    }



    // public function sendGrades()
    // {
    //     // Retrieve all students with their grades and associated courses
    //     $students = Student::with('grades.courses')->get();

    //     $gradesData = []; // Initialize the array to hold all grades data

    //     foreach ($students as $student) {
    //         foreach ($student->grades as $grade) {
    //             // Assuming the grade has a relationship to the course

    //             foreach ($grade->courses as $course) {
    //                 $gradesData[] = [
    //                     'student_name' => $student->name_en, // Include student name
    //                     'course_name' => $course->name,
    //                     'grade_value' => $grade->grade, // Accessing the grade
    //                 ];
    //             }
    //         }
    //     }

    //     return response()->json($gradesData);

    // }

}
