<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name'),
            'favicon' => Setting::get('favicon'),
            'logo' => Setting::get('logo'),
            'trust_script' => Setting::get('trust_script'),
            'organization_script' => Setting::get('organization_script'),
            'admin_email' => Setting::get('admin_email'),
            'store_state' => Setting::get('store_state'),
            'store_city' => Setting::get('store_city'),
            'payment_gateway' => Setting::get('payment_gateway'),
            'payment_key' => Setting::get('payment_key'),
            'sms_phone' => Setting::get('sms_phone'),
            'sms_username' => Setting::get('sms_username'),
            'sms_password' => Setting::get('sms_password'),
            'sms_sender' => Setting::get('sms_sender'),
        ];
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'admin_email' => 'required|email',
        ]);

        foreach ($request->all() as $key => $value) {
            if ($key === '_token') continue;

            if ($request->hasFile($key)) {
                $value = $request->file($key)->store('settings', 'public');
            }

            Setting::set($key, $value);
        }

        return redirect()->route('settings.index')->with('success', 'تنظیمات با موفقیت ذخیره شد.');
    }
}
