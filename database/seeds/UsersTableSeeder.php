<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ronzu',
            'email' => 'ronzu@rocket.com',
            'password' => bcrypt('rocket.ronzu')
        ]);

        User::create([
            'name' => 'Nazmus Shakib',
            'email' => 'nshakib.se@gmail.com',
            'password' => bcrypt('nshakib.123456')
        ]);
    }
}
