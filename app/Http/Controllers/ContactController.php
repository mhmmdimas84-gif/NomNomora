<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display public contact page.
     */
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name', 'NomNomora'),
            'whatsapp_number' => Setting::get('whatsapp_number', ''),
            'instagram' => Setting::get('instagram', ''),
            'tiktok' => Setting::get('tiktok', ''),
            'address' => Setting::get('address', ''),
            'opening_hours' => Setting::get('opening_hours', ''),
            'google_maps_embed' => Setting::get('google_maps_embed', ''),
        ];

        // Clean whatsapp link for chat button
        $cleanWhatsapp = preg_replace('/[^0-9]/', '', $settings['whatsapp_number']);
        $whatsappUrl = "https://wa.me/" . $cleanWhatsapp . "?text=" . urlencode("Halo NomNomora 👋\n\nSaya ingin bertanya mengenai menu camilan yang tersedia.");

        return view('contact', compact('settings', 'whatsappUrl'));
    }
}
