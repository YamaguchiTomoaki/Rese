<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Representative;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AreaTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(RepresentativeTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(AdminTableSeeder::class);
    }
}
