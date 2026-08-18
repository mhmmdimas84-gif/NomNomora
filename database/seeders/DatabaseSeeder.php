<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        User::create([
            'name' => 'Admin NomNomora',
            'email' => 'admin@nomnomora.com',
            'password' => Hash::make('password123'),
        ]);

        // 2. Create Categories
        $camilan = Category::create([
            'name' => 'Camilan',
            'slug' => 'camilan',
            'description' => 'Camilan renyah, gurih, dan creamy peneman waktu santai Anda.',
        ]);

        $riceBites = Category::create([
            'name' => 'Rice Bites',
            'slug' => 'rice-bites',
            'description' => 'Bola-bola nasi gurih dengan lauk kekinian yang mengenyangkan.',
        ]);

        $paket = Category::create([
            'name' => 'Paket',
            'slug' => 'paket',
            'description' => 'Pilihan menu paket hemat gabungan camilan dan nasi untuk porsi rame-rame.',
        ]);

        // 3. Create Products
        Product::create([
            'category_id' => $camilan->id,
            'name' => 'Crab Puffs',
            'slug' => 'crab-puffs',
            'description' => 'Camilan renyah dengan isian creamy yang bikin nagih!',
            'ingredients' => 'Kulit pangsit berkualitas, crab stick premium, mayones gurih, keju spread creamy, disajikan dengan saus sambal cocolan seblak kencur yang pedas manis gurih.',
            'price' => 18000.00,
            'image' => 'products/crab_puffs.png',
            'is_available' => true,
            'is_featured' => true,
        ]);

        Product::create([
            'category_id' => $riceBites->id,
            'name' => 'Chikki Rice Bites',
            'slug' => 'chikki-rice-bites',
            'description' => 'Bola-bola nasi yang gurih, dipadukan dengan Korean Chicken Popcorn dan saus khas yang lezat.',
            'ingredients' => 'Nasi pulen pilihan, parutan wortel segar, taburan nori (rumput laut kering), Korean Chicken Popcorn krispi, dibalut saus spesial manis pedas khas NomNomora.',
            'price' => 22000.00,
            'image' => 'products/rice_bites.png',
            'is_available' => true,
            'is_featured' => true,
        ]);

        Product::create([
            'category_id' => $camilan->id,
            'name' => 'Cheesy Seblak Puffs',
            'slug' => 'cheesy-seblak-puffs',
            'description' => 'Kulit pangsit renyah berisi keju cheddar gurih dipadukan bumbu cocolan seblak kencur pedas nampol.',
            'ingredients' => 'Kulit pangsit, keju cheddar parut, sosis sapi, bumbu seblak cabai merah kencur.',
            'price' => 20000.00,
            'image' => null,
            'is_available' => true,
            'is_featured' => false,
        ]);

        Product::create([
            'category_id' => $riceBites->id,
            'name' => 'Garlic Butter Rice Bites',
            'slug' => 'garlic-butter-rice-bites',
            'description' => 'Bola nasi gurih dengan aroma mentega bawang putih harum, disajikan bersama ayam krispi berbalut saus madu.',
            'ingredients' => 'Nasi, margarin mentega, cincangan bawang putih goreng, ayam krispi saus madu manis.',
            'price' => 25000.00,
            'image' => null,
            'is_available' => true,
            'is_featured' => false,
        ]);

        Product::create([
            'category_id' => $paket->id,
            'name' => 'NomNom Sharing Box',
            'slug' => 'nomnom-sharing-box',
            'description' => 'Paket bundling berisi 1 porsi Crab Puffs dan 1 porsi Chikki Rice Bites. Pas untuk dinikmati bersama teman atau keluarga.',
            'ingredients' => '1 Porsi Crab Puffs lengkap dengan saus cocolan seblak + 1 Porsi Chikki Rice Bites gurih.',
            'price' => 38000.00,
            'image' => null,
            'is_available' => true,
            'is_featured' => true,
        ]);

        // 4. Create Settings
        $settings = [
            'site_name' => 'NomNomora',
            'tagline' => 'Every Bite. Pure Delight.',
            'description' => 'NomNomora menghadirkan camilan lezat kekinian seperti Crab Puffs dan Chikki Rice Bites dengan cita rasa gurih, creamy, pedas, dan menggugah selera.',
            'whatsapp_number' => '6281234567890',
            'instagram' => '@nomnomora.id',
            'tiktok' => '@nomnomora.id',
            'address' => 'Jl. Kuliner Kekinian No. 45, Kebayoran Baru, Jakarta Selatan, 12130',
            'opening_hours' => 'Senin - Minggu: 10:00 - 21:00 WIB',
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2736173007323!2d106.8009228!3d-6.2276332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14e3dbf27ef%3A0x6d900693a103c153!2sBlok%20M%20Square!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
            'footer_text' => '© 2026 NomNomora. All Rights Reserved.',
        ];

        foreach ($settings as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }

        // 5. Create Testimonials
        Testimonial::create([
            'name' => 'Budi Santoso',
            'photo' => null,
            'rating' => 5,
            'message' => 'Crab Puffs-nya beneran nagih! Bagian luarnya renyah banget, trus isian crab stick sama kejunya creamy melimpah. Bakal langganan sih ini.',
            'is_active' => true,
        ]);

        Testimonial::create([
            'name' => 'Siti Aminah',
            'photo' => null,
            'rating' => 5,
            'message' => 'Chikki Rice Bites porsinya pas buat ganjel perut siang-siang. Bola nasinya gurih plus chicken popcorn-nya dengan saus khas NomNomora bener-bener nampol!',
            'is_active' => true,
        ]);

        Testimonial::create([
            'name' => 'Rian Hidayat',
            'photo' => null,
            'rating' => 4,
            'message' => 'Kemasan produknya rapi dan bersih. Pesen via WA fast response banget, 15 menit langsung siap di-pick up. Rekomendasi buat camilan santai.',
            'is_active' => true,
        ]);

        // 6. Create Galleries
        Gallery::create([
            'title' => 'Bahan Baku Premium Pilihan',
            'image' => 'gallery_1.jpg',
            'description' => 'Kami selalu memilih bahan baku segar dan berkualitas tinggi demi menjaga kenikmatan rasa setiap gigitan.',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Proses Pengolahan Higienis',
            'image' => 'gallery_2.jpg',
            'description' => 'Setiap pesanan diolah secara bersih dan sesuai standar sanitasi ketat.',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Kemasan Rapi dan Ramah Lingkungan',
            'image' => 'gallery_3.jpg',
            'description' => 'Kemasan NomNomora dirancang khusus agar makanan tetap krispi dan hangat sampai di tangan Anda.',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Penyajian Hangat Chikki Rice Bites',
            'image' => 'gallery_4.jpg',
            'description' => 'Disajikan fresh to order untuk cita rasa lezat maksimal.',
            'is_active' => true,
        ]);
    }
}
