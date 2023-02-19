<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagTableSeeder extends Seeder
{
    static $postTags = [
        [1, 2],
        [2, 1],
        [2, 3],
        [3, 1],
        [3, 4]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$postTags as $postTag) {
            DB::table('post_tag')->insert([
                'post_id' => $postTag[0],
                'tag_id' => $postTag[1]
            ]);
        }
    }
}
