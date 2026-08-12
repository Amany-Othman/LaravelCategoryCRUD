<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\HomeContent::create([
        'key' => 'hero_title',
        'value' => [
            'en' => 'Bringing health to life for the whole family.',
            'ar' => 'نمنح الحياة صحة أفضل لجميع أفراد الأسرة.',
        ],
    ]);

    \App\Models\HomeContent::create([
        'key' => 'hero_subtitle',
        'value' => [
            'en' => 'The best medical center',
            'ar' => 'أفضل مركز طبي',
        ],
    ]);

    \App\Models\HomeContent::create([
        'key' => 'hero_button',
        'value' => [
            'en' => 'Discover More',
            'ar' => 'اكتشف المزيد',
        ],
    ]);
}
}