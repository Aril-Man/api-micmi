<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'title' => "Castlevania",
                'slug' => "castlevania",
                'score' => 90,
                'genre_id' => "Action,War,Anime",
                'image' => "https://cdn.myanimelist.net/images/manga/5/14648.jpg",
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ],
            [
                'title' => "Naruto the Movie",
                'slug' => "naruto the movie",
                'score' => 90,
                'genre_id' => "Action,War,Anime,Drama",
                'image' => "https://cdn.myanimelist.net/images/anime/10/67631.jpg",
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ],
            [
                'title' => "Shingeki no Kyojin",
                'slug' => "shingeki no kyojin",
                'score' => 89,
                'genre_id' => "Action,War,Anime",
                'image' => "https://cdn.myanimelist.net/images/anime/1988/119437.jpg",
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ],
            [
                'title' => "Genjitsu Shugi Yuusha no Oukoku Saikenki Part 2",
                'slug' => "genjitsu shugi yuusha no oukoku saikenki part 2",
                'score' => 80,
                'genre_id' => "Action,Anime,Drama",
                'image' => "https://cdn.myanimelist.net/images/manga/5/14648.jpg",
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ]
        ];
        DB::table('tbl_show')->insert($post);
    }
}