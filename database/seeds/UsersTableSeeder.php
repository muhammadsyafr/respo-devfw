<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'muhammadsyafr@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Muhammad Syafrizal',
                'email' => 'muhammadsyafr@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('admin123')
            ]);

            User::create([
                'name' => 'Muhammad Syafrizal',
                'email' => 'muhammad.1705@students.amikom.ac.id',
                'role' => 'writer',
                'password' => Hash::make('operator123')
            ]);
        }
    }
}
