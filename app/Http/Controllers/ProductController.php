<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the public product menu catalog.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        
        $query = Product::with('category')->where('is_available', true);

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by Search Term
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        // Default setting for WhatsApp
        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        // Inject WhatsApp links to products on catalog
        foreach ($products as $product) {
            $text = "Halo NomNomora 👋\n\nSaya ingin memesan:\n\nProduk: " . $product->name . "\nHarga: Rp " . number_format($product->price, 0, ',', '.') . "\n\nApakah produk tersebut masih tersedia?\n\nTerima kasih.";
            $product->whatsapp_url = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($text);
        }

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display the product detail page.
     */
    public function show($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        // Fetch related products (same category, excluding current product)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_available', true)
            ->take(4)
            ->get();

        // Generate WhatsApp link
        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
        
        $text = "Halo NomNomora 👋\n\nSaya ingin memesan:\n\nProduk: " . $product->name . "\nHarga: Rp " . number_format($product->price, 0, ',', '.') . "\n\nApakah produk tersebut masih tersedia?\n\nTerima kasih.";
        $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($text);

        // Inject WhatsApp link to related products
        foreach ($relatedProducts as $rp) {
            $rpText = "Halo NomNomora 👋\n\nSaya ingin memesan:\n\nProduk: " . $rp->name . "\nHarga: Rp " . number_format($rp->price, 0, ',', '.') . "\n\nApakah produk tersebut masih tersedia?\n\nTerima kasih.";
            $rp->whatsapp_url = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($rpText);
        }

        return view('products.show', compact('product', 'relatedProducts', 'whatsappUrl'));
    }
}
