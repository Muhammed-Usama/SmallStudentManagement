<?php

namespace Database\Seeders;



use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecods = [
            'name' => 'Admin',
            'type' => 'admin',
            'mobile' => '1234564',
            'email' => 'mohammed@gmail.com',
            'password' => $password,
            'status' => 1,
            'role' => 'admin',
        ];
        Admin::insert([$adminRecods]);
        User::insert([$adminRecods]);
    }
}
