<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 30;

        //Tin tức
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $post->title = $faker->unique()->sentence($nbWords = 6);
            $post->description = $faker->text(200);
            $post->content = '<p>' . $faker->text(500).'</p>';
            $post->thumbnail = 'https://placeimg.com/640/480/'.rand(0,100);
            $post->series_id = rand(1,5);
            $post->user_id = rand(8,20);
            $post->save();
        }

    }
}
