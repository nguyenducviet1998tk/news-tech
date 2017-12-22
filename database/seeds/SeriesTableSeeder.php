<?php

use Illuminate\Database\Seeder;
use App\Series;
class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 15;
        for ($i = 0; $i < $limit; $i++) {

            $series = new Series();
            $series->name = $faker->unique()->sentence($nbWords = 6);
            $series->slug = str_slug($series->name);
            $series->thumbnail = 'https://placeimg.com/640/480/any';
            $series->save();
        }
    }
}
