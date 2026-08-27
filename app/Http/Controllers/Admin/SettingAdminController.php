<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingAdminController extends Controller
{
    public function index()
    {
        $settings = [
            'phone' => SiteSetting::get('phone'),
            'mobile' => SiteSetting::get('mobile'),
            'email' => SiteSetting::get('email'),
            'address' => SiteSetting::get('address'),
            'working_hours' => SiteSetting::get('working_hours'),
            'facebook' => SiteSetting::get('facebook'),
            'linkedin' => SiteSetting::get('linkedin'),
            'instagram' => SiteSetting::get('instagram'),
            'about_short' => SiteSetting::get('about_short'),
            'page_about_active' => SiteSetting::get('page_about_active', '1'),
            'page_services_active' => SiteSetting::get('page_services_active', '1'),
            'page_news_active' => SiteSetting::get('page_news_active', '1'),
            'page_contact_active' => SiteSetting::get('page_contact_active', '1'),
        ];
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fields = ['phone', 'mobile', 'email', 'address', 'working_hours', 'facebook', 'linkedin', 'instagram', 'about_short', 'hero_badge', 'hero_title', 'hero_desc'];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field));
            }
        }

        // Checkboxes / Toggles
        $toggles = ['page_about_active', 'page_services_active', 'page_news_active', 'page_contact_active'];
        foreach ($toggles as $toggle) {
            SiteSetting::set($toggle, $request->has($toggle) ? '1' : '0');
        }

        return redirect()->back()->with('success', 'Site ayarları güncellendi.');
    }
}
