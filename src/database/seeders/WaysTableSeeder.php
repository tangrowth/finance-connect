<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ways = [
            ['title' => '不動産投資'],
            ['title' => '外国為替取引（FX）'],
            ['title'=> '株式投資'],
            ['title' => '債券投資'],
            ['title' => '投資信託'],
        ];

        DB::table('ways')->insert($ways);
    }
}
