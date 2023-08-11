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
            ['type' => '会社員'],
            ['type' => '主婦・主夫'],
            ['type' => '経営者'],
            ['type' => 'パート'],
            ['type' => '定年退職'],
            ['type' => '公務員'],
            ['type' => '自営業'],
            ['type' => '教員'],
            ['type' => '医療従事者'],

        ];

        DB::table('types')->insert($types);
    }
}
