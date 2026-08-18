<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the public home page.
     */
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('is_available', true)
            ->where('is_featured', true)
            ->take(6)
            ->get();

        $testimonials = Testimonial::where('is_active', true)->get();

        $settings = [
            'site_name' => Setting::get('site_name', 'NomNomora'),
            'tagline' => Setting::get('tagline', 'Every Bite. Pure Delight.'),
            'description' => Setting::get('description', ''),
            'whatsapp_number' => Setting::get('whatsapp_number', ''),
        ];

        return view('home', compact('featuredProducts', 'testimonials', 'settings'));
    }

    /**
     * Show the public about page.
     */
    public function about()
    {
        $settings = [
            'site_name' => Setting::get('site_name', 'NomNomora'),
            'tagline' => Setting::get('tagline', 'Every Bite. Pure Delight.'),
            'description' => Setting::get('description', ''),
        ];

        return view('about', compact('settings'));
    }
}
