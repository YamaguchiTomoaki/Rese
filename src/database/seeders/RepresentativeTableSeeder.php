<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RepresentativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => '責任者太郎',
            'email' => 'representative@gmail.com',
            'password' => Hash::make('shop_representative1'),
            'created_at' => '2024-01-01 11:11:11',
            'updated_at' => '2024-01-01 11:11:11',
        ];
        DB::table('representatives')->insert($param);

        $param = [
            'name' => '責任者次郎',
            'email' => 'representative2@gmail.com',
            'password' => Hash::make('shop_representative2'),
            'created_at' => '2024-01-01 11:11:11',
            'updated_at' => '2024-01-01 11:11:11',
        ];
        DB::table('representatives')->insert($param);

        $param = [
            'name' => '責任者三郎',
            'email' => 'representative3@gmail.com',
            'password' => Hash::make('shop_representative3'),
            'created_at' => '2024-01-01 11:11:11',
            'updated_at' => '2024-01-01 11:11:11',
        ];
        DB::table('representatives')->insert($param);
    }
}
