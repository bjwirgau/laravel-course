<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Delete data in all tables. Truncate is preferrable since it automatically resets auto-increment counters
        // However, delete is used here to avoid issues with foreign key constraints
        DB::table('users')->delete(); 
        DB::table('job_listings')->delete();

        // Reset auto-increment counters
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        DB::statement('ALTER TABLE job_listings AUTO_INCREMENT = 1');

        $this->call(TestUserSeeder::class);
        $this->call(RandomUserSeeder::class);
        $this->call(JobSeeder::class);
    }
}
