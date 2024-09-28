<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $ValidatedData = validator($request->all(), [
            "email" => "required",
            "password" => "required",
        ]);
        if ($ValidatedData->fails()) {
            return response()->json([
                "error" => $ValidatedData->errors()->first(),
            ], 401);
        }
        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "msg" => "Invalid User"
            ], 401);
        }

        $token = $user->createToken('auth_token')->accessToken;

        // $token = $user->createToken('bagisto')->accessToken;
        // $token = $user->createToken('auth_token', ['*'])->accessToken;
        // $token = $token->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'Data' => $user,

        ]);
    }
}
