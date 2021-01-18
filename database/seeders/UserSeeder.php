<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Create a default user
        User::create([
            'username' => 'mikael',
            'name' => 'Mikael Schultz',
            'email' => 'mikael@test.com',
            'presentation' => 'The first user in the Tweety system.',
            'password' => Hash::make('Mikael123'),
        ]);
    }
}
