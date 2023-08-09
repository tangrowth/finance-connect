<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['type' => '学生'],
            ['type' => '社会人'],
            ['type' => '主婦・主夫'],
            ['type' => 'フリーランス'],
            ['type' => '経営者'],
            ['type' => 'パートタイマー'],
            ['type' => 'シニア'],

        ];

        DB::table('types')->insert($types);
    }
}
