<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User 1 - Menggunakan Query Builder
        $user1 = DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@demo.com',
            'password' => bcrypt('pass123'),
            'phone' => '0123456789',
            'status' => 'aktif',
        ]);

        // User 2 - Menggunakan Model kaedah new Object
        $user2 = new User;
        $user2->name = 'User 2';
        $user2->email = 'user2@demo.com';
        $user2->password = bcrypt('pass123');
        $user2->phone = '0123456789';
        $user2->status = 'aktif';
        $user2->save();

        // User 3 - Menggunakan Model kaedah method create()
        // Syarat untuk menggunakan method create, pastikan didalam Model ada property fillable
        $user3 = User::create([
            'name' => 'User 3',
            'email' => 'user3@demo.com',
            'password' => bcrypt('pass123'),
            'phone' => '0123456789',
            'status' => 'aktif',
        ]);
    }
}
