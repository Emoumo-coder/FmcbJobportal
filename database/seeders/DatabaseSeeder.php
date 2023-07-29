<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyProfileGallery;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Listing::factory()->create();

        for ($i = 1; $i  <= 6; $i++) { 
            CompanyProfileGallery::create([
                'photo' => "company-hero-$i.jpg",
                'caption' => "Photo gallery caption $i"
            ]);
        }
    }
}
