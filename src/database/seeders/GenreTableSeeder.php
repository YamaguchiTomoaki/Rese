<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'genre' => 'イタリアン',
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre' => 'ラーメン',
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre' => '居酒屋',
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre' => '寿司',
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre' => '焼肉',
        ];
        DB::table('genres')->insert($param);
    }
}
