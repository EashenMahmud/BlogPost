<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Uncomment to create 10 users using the factory
        // User::factory(10)->create();

        // Create a specific user with custom data
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call other seeders for additional data
        $this->call([
            SectionsTableSeeder::class,
            // Add more seeders as needed
        ]);
    }
}
