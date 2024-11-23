<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // دریافت تنظیمات از جدول
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'favicon' => 'nullable|file|mimes:png,ico',
            'logo' => 'nullable|file|mimes:jpg,jpeg,png',
            'trust_script' => 'nullable|string',
            'manager_email' => 'nullable|email',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'payment_gateway' => 'nullable|string',
            'gateway_key' => 'nullable|string',
            'sms_phone' => 'nullable|string',
            'sms_username' => 'nullable|string',
            'sms_password' => 'nullable|string',
            'sms_sender' => 'nullable|string',
        ]);

        // پردازش تنظیمات
        $data = $request->all();

        foreach ($data as $key => $value) {
            if ($key === 'favicon' || $key === 'logo') {
                if ($request->hasFile($key)) {
                    $value = $request->file($key)->store('settings', 'public');
                } else {
                    continue;
                }
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('settings.index')->with('success', 'تنظیمات با موفقیت ذخیره شد.');
    }
}
