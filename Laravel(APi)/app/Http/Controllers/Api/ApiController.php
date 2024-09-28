<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Student;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{

    public function show()
    {
        $students = Student::with('courses')->get();
        $data = [
            'msg' => 'Show all data',
            'Status' => 200,
            'data' => $students
        ];

        return response()->json($data);
    }
    public function showid(Request $request)
    {
        $courses_name = [];
        $id = $request->id;
        $student = Student::with('courses')->findOrFail($id);
        foreach ($student->courses as $course) {
            $courses_name[] = $course->name;
        }

        if ($student) {
            $data = [
                'msg' => 'Show all data',
                'Status' => 200,
                'data' => [
                    'id' => $student->id,
                    'name_en' => $student->name_en,
                    'name_ar' => $student->name_ar,
                    'address_en' => $student->address_en,
                    'address_ar' => $student->address_ar,
                    'mobile' => $student->mobile,
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

        $student = Student::findOrFail($id);

        if ($student) {
            $student->courses()->detach();
            $student->grades()->detach();
            $student->delete();
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


        $new = Student::create([
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
        $student = Student::findOrFail($id);

        $student->update([
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'address_en' => $request->input('address_en'),
            'address_ar' => $request->input('address_ar'),
            'mobile' => $request->input('mobile'),
        ]);

        $data = [
            "msg" => "Created Seccussfully",
            "status" => 200,
            "Data" => $student,
        ];
        return response()->json($data);

    }


}
