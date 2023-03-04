<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    static $images = [
        ['https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/640px-Flag_of_Europe.svg.png', '1', 'App\Models\Post'],
        ['https://sas-production-uploads.s3.eu-west-2.amazonaws.com/article_main_img/tool/large_999733180.png', '2', 'App\Models\Post'],
        ['https://miro.medium.com/max/800/1*QPmnnsbvI27ZMbwkZ7FRpA.jpeg', '3', 'App\Models\Post']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$images as $image) {
            DB::table('images')->insert([
                'url' => $image[0],
                'imageable_id' => $image[1],
                'imageable_type' => $image[2]
            ]);
        }
    }
}
