<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guest = [
            'first_name' => 'Raisul',
            'last_name' => 'Showmin',
            'email' => 'raisul.syp@gmail.com',
            'password' => bcrypt('123456789')
        ];
        User::create($guest);
    }
}
