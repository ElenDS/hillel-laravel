<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    static $tags = [
        'lifestyle',
        'EuropeanUnion',
        'Kyiv',
        'vitamins'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$tags as $tags) {
            DB::table('tags')->insert([
                'name' => $tags
            ]);
        }
    }
}
