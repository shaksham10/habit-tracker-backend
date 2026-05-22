<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    // GET SETTINGS
    public function index()
    {
        $setting = Setting::first();

        if (!$setting) {

            $setting = Setting::create([
                'full_name' => '',
                'email' => '',
                'daily_goal' => 1,
            ]);
        }

        return response()->json($setting);
    }

    // UPDATE SETTINGS
    public function update(Request $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->update([
            'full_name' =>
                $request->full_name,

            'email' =>
                $request->email,

            'daily_goal' =>
                $request->daily_goal,

            'dark_mode' =>
                $request->dark_mode,

            'email_notifications' =>
                $request->email_notifications,

            'reminder_alerts' =>
                $request->reminder_alerts,
        ]);

        return response()->json([
            'message' => 'Settings updated',
            'data' => $setting,
        ]);
    }
}