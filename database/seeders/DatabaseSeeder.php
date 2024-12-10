<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Typelubrifiant;
use App\Models\Typeorgane;
use App\Models\Typepanne;
use App\Models\Typeparc;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Site::factory(10)->create();

        // Typeparc::factory(10)->create();

        Typelubrifiant::factory(10)->create();

        Typeorgane::factory(10)->create();

        Typepanne::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
