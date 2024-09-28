<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiTeacherController extends Controller
{
    public function show()
    {
        $Teachers = Teacher::with('courses')->get();
        $data = [
            'msg' => 'Show all data',
            'Status' => 200,
            'data' => $Teachers
        ];

        return response()->json($data);
    }
    public function showid(Request $request)
    {
        $courses_name = [];
        $id = $request->id;
        $Teacher = Teacher::with('courses')->findOrFail($id);
        foreach ($Teacher->courses as $course) {
            $courses_name[] = $course->name;
        }

        if ($Teacher) {
            $data = [
                'msg' => 'Show all data',
                'Status' => 200,
                'data' => [
                    'id' => $Teacher->id,
                    'name_en' => $Teacher->name_en,
                    'name_ar' => $Teacher->name_ar,
                    'address_en' => $Teacher->address_en,
                    'address_ar' => $Teacher->address_ar,
                    'mobile' => $Teacher->mobile,
                    'courses' => $courses_name
                ]
            ];

            return response()->json($data);
        } else {
            $data = [
                'msg' => 'Show all data',
                'Status' => 203,
                'data' => null
            ];

            return response()->json($data);
        }
    }

    public function delete($id)
    {

        $Teacher = Teacher::findOrFail($id);

        if ($Teacher) {
            $Teacher->delete();
            $data = [
                "msg" => "Deleted Seccussfully",
                "status" => 200,
                "Data" => null,
            ];
            return response()->json($data);
        } else {
            $data = [
                "msg" => "NOthing Deleted",
                "status" => 203,
                "Data" => null
            ];
            return response()->json($data);
        }
    }

    public function add(Request $request)
    {
        // validator($request->all(), []);
        $validatedData = Validator::make($request->all(), [
            'name_en' => 'required',
            'name_ar' => 'required',
            'address_en' => 'required',
            'address_ar' => 'required',
            'mobile' => 'required',
        ]);
        if ($validatedData->fails()) {
            //Insert Into database
            $data = [
                'msg' => 'Validation failed',
                'errors' => $validatedData->errors(),
                'status' => 422,

            ];
            return response()->json($data);

        }


        $new = Teacher::create([
            'id' => $request['id'],
            'name_en' => $request['name_en'],
            'name_ar' => $request['name_ar'],
            'address_en' => $request['address_en'],
            'address_ar' => $request['address_ar'],
            'mobile' => $request['mobile'],
        ]);
        $data = [
            "msg" => "Created Seccussfully",
            "status" => 200,
            "Data" => $new,
        ];
        return response()->json($data);

    }

    public function update(Request $request)
    {
        $id = $request->input("id");
        $Teacher = Teacher::findOrFail($id);

        $Teacher->update([
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'address_en' => $request->input('address_en'),
            'address_ar' => $request->input('address_ar'),
            'mobile' => $request->input('mobile'),
        ]);

        $data = [
            "msg" => "Created Seccussfully",
            "status" => 200,
            "Data" => $Teacher,
        ];
        return response()->json($data);

    }
    public function avg_grades()
    {
        // Fetch teachers with their courses and grades
        $teachers = Teacher::with('courses.grades')->get();

        // Prepare the data
        $data = $teachers->map(function ($teacher) {
            return $teacher->courses->map(function ($course) use ($teacher) {
                // Calculate the average grade for the course
                $averageGrade = $course->grades->avg('grade');
                return [
                    'teacher_name' => $teacher->name_en,
                    'course_name' => $course->name,
                    'average_grade' => number_format($averageGrade, 2)
                ];
            });
        })->flatten(1);

        // Prepare the response
        $response = [
            'msg' => 'Created Successfully',
            'status' => 200,
            'data' => $data,
        ];

        return response()->json($response);
    }

}
