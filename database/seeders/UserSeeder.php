<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user1 = User::create([
            'email' => 'emanuelvaca39@gmail.com',
            'password' => Hash::make('contrasena'),
        ])->assignRole('administrador');


        // User::factory(9)->create();

    }
}
