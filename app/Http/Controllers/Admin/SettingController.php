<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the settings.
     */
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name', 'NomNomora'),
            'tagline' => Setting::get('tagline', 'Every Bite. Pure Delight.'),
            'description' => Setting::get('description', ''),
            'whatsapp_number' => Setting::get('whatsapp_number', ''),
            'instagram' => Setting::get('instagram', ''),
            'tiktok' => Setting::get('tiktok', ''),
            'address' => Setting::get('address', ''),
            'opening_hours' => Setting::get('opening_hours', ''),
            'google_maps_embed' => Setting::get('google_maps_embed', ''),
            'footer_text' => Setting::get('footer_text', ''),
        ];

        return view('admin.settings', compact('settings'));
    }

    /**
     * Update the settings in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',
            'whatsapp_number' => 'required|string|max:50',
            'instagram' => 'nullable|string|max:100',
            'tiktok' => 'nullable|string|max:100',
            'address' => 'required|string',
            'opening_hours' => 'required|string|max:255',
            'google_maps_embed' => 'nullable|string',
            'footer_text' => 'required|string|max:255',
        ]);

        $keys = [
            'site_name',
            'tagline',
            'description',
            'whatsapp_number',
            'instagram',
            'tiktok',
            'address',
            'opening_hours',
            'google_maps_embed',
            'footer_text',
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key));
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
