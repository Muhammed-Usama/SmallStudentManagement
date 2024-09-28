<?php

namespace App\Http\Controllers;

use App\Models\DeviceTocken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationController extends Controller
{
    protected $firebaseMessaging;

    public function __construct()
    {
        $serviceAccountPath = storage_path(env('FIREBASE_CREDENTIALS', 'send-notification-1c643-firebase-adminsdk-5c9f7-f6225608d3.json'));


        // Initialize Firebase Messaging
        $this->firebaseMessaging = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->createMessaging();
    }

    public function sendNotification(Request $request)
    {
        $deviceToken = $request->input('token');
        $title = $request->input('title');
        $body = $request->input('body');

        if (!$deviceToken || !$title || !$body) {
            return response()->json([
                'status' => 'error',
                'message' => 'Missing required fields: token, title, and/or body'
            ], 400);
        }

        $message = CloudMessage::withTarget('token', $deviceToken)
            ->withNotification([
                'title' => $title,
                'body' => $body,
            ]);

        try {
            $this->firebaseMessaging->send($message);
            return response()->json(['status' => 'success', 'message' => 'Notification sent']);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }


    public function saveDeviceToken(Request $request)
    {
        $token = $request->input('token');

        // Retrieve the authenticated user
        if ($token) {
            // Save the token in the database for the user
            $check = DeviceTocken::where('device_token', $token)->first();

            if (!$check) {
                // Save the token in the database for the user if it doesn't exist
                DeviceTocken::create(['device_token' => $token]);
                return response()->json(['status' => 'success', 'message' => 'Device token saved']);
            }

            return response()->json(['status' => 'info', 'message' => 'Token already exists']);
        }


        return response()->json([
            'status' => 'worng',
            'message' => 'invalid token',
            "token" => $token
        ], 401);
    }

    public function alltokens()
    {
        $tokens = DeviceTocken::all();
        return response()->json(
            [
                "status" => 200,
                'Tokens' => $tokens
            ]

        );
    }
}
