<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display public gallery page.
     */
    public function index()
    {
        $galleries = Gallery::where('is_active', true)->latest()->get();
        return view('gallery', compact('galleries'));
    }
}
