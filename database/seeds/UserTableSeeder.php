<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 20;
     
        for ($i = 0; $i < $limit; $i++) {
            $users[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => '123456',
                'avatar' => 'https://randomuser.me/api/portraits/men/'.$i.'.jpg',
            ];
        }
        DB::table('users')->insert($users);
    }
}
