<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    static $posts = [
        ['Member state of the European Union', 'The European Union (EU) is a political and economic union of 27 member states that are signatories to the founding treaties of the union and thereby share in the privileges and obligations of membership.', 1, 3],
        ['Ways to Realign Higher Education', 'There\'s a stark misalignment between the talents employers demand and the skills graduates have as they enter the U.S. workforce. And many higher education leaders fail to see it.', 1, 1],
        ['How to maintain good health?', 'A healthy lifestyle will help maintain good health until old age. Go in for sports, follow proper nutrition, undergo a medical examination on time.', 1, 2]

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$posts as $post) {
            DB::table('posts')->insert([
                'title' => $post[0],
                'text' => $post[1],
                'user_id' => $post[2],
                'category_id' => $post[3]
            ]);
        }
    }
}
