<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++) {
            \App\User::create([
                'name' => $faker->name . $i,
                'email' => 'nshakib.se+'. $i .'@gamil.com',
                'password' => bcrypt('secret')
            ]);
        }
    }
}
