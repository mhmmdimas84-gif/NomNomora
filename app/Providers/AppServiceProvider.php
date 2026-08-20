<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->runningInConsole() || (\Illuminate\Support\Facades\Schema::hasTable('settings'))) {
            try {
                $settings = [
                    'site_name' => \App\Models\Setting::get('site_name', 'NomNomora'),
                    'tagline' => \App\Models\Setting::get('tagline', 'Every Bite. Pure Delight.'),
                    'description' => \App\Models\Setting::get('description', ''),
                    'whatsapp_number' => \App\Models\Setting::get('whatsapp_number', '6281234567890'),
                    'instagram' => \App\Models\Setting::get('instagram', '@nomnomora.id'),
                    'tiktok' => \App\Models\Setting::get('tiktok', '@nomnomora.id'),
                    'address' => \App\Models\Setting::get('address', ''),
                    'opening_hours' => \App\Models\Setting::get('opening_hours', ''),
                    'google_maps_embed' => \App\Models\Setting::get('google_maps_embed', 'https://www.google.com/maps?q=-3.7552414,114.7643835&z=17&output=embed'),
                    'footer_text' => \App\Models\Setting::get('footer_text', '© 2026 NomNomora. All Rights Reserved.'),
                ];
                view()->share('globalSettings', $settings);
            } catch (\Exception $e) {
                // Fail gracefully if DB is not ready
            }
        }
    }
}
