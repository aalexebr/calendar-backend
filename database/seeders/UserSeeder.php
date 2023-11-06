<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\User;

// Helpers
use Illuminate\Support\Facades\Hash;

// facades
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Alex',
                'surname'=>'checojoni',
                'email' => 'alex@a.a',
                'password' => 'password',
                'role'=> 1
            ],
            [
                'name' => 'Mich',
                'surname'=>'checojoni',
                'email' => 'mich@a.a',
                'password' => 'password',
                'role'=> 1
            ],
        ];


        
        Schema::withoutForeignKeyConstraints(function(){
            User::truncate();
        });

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'surname' => $user['surname'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'is_admin'=> $user['role']
            ]);
        }
    }
    
}
