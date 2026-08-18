<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Gallery;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard index.
     */
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'available_products' => Product::where('is_available', true)->count(),
            'total_categories' => Category::count(),
            'total_testimonials' => Testimonial::count(),
            'total_galleries' => Gallery::count(),
        ];

        // Fetch recent products and testimonials for dashboard preview tables
        $recentProducts = Product::with('category')->latest()->take(5)->get();
        $recentTestimonials = Testimonial::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentProducts', 'recentTestimonials'));
    }
}
