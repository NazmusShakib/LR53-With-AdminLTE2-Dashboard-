<?php

use Illuminate\Database\Seeder;

class DirectoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 6;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('directories')->insert([ //,
                'name' => $faker->name($gender = null|'male'|'female'),
                'email' =>  $faker->email,
                'batch_and_dept' => $faker->word,
                'email' => $faker->freeEmail,
                'mobile' => $faker->phoneNumber,
                'present_address' => $faker->address
            ]);
        }
    }
}
