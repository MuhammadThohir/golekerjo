<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $data = $request->only([

            // Identitas
            'site_name',
            'tagline',

            // Kontak
            'email',
            'phone',
            'address',

            // Sosial Media
            'facebook_url',
            'instagram_url',
            'linkedin_url',
            'youtube_url',
            'tiktok_url',
            'twitter_url',
            'threads_url',
            'telegram_url',
            'whatsapp_url',

            // SEO & Analytics
            'meta_title',
            'meta_description',
            'google_verification',
            'ga4_id',
            'statcounter_code',

            // Footer
            'footer_text',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Logo Besar
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo')) {

            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $data['logo'] = $request
                ->file('logo')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Logo Kecil
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo_small')) {

            if ($setting->logo_small) {
                Storage::disk('public')->delete($setting->logo_small);
            }

            $data['logo_small'] = $request
                ->file('logo_small')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Favicon
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('favicon')) {

            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $data['favicon'] = $request
                ->file('favicon')
                ->store('settings', 'public');
        }

        $setting->update($data);

        return redirect()
            ->back()
            ->with('success', 'Pengaturan berhasil disimpan.');
    }

}
