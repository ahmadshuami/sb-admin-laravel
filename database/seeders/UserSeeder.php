<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::truncate();

        $user = [
            '1' => [
                'John Doe',
                'john.doe@email.com', 
                'user12345'
            ]
        ];

        foreach ($user as $idx => $data) {
            User::create([
                'name'      => $data[0],
                'email'     => $data[1],
                'password'  => Hash::make($data[2])
            ]);
        }
    }
}
