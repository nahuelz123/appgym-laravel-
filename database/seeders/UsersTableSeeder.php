<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      /*    User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'), // Cambia la contraseña según tus necesidades
            'role' => 'admin', // Asegúrate de que este campo esté definido en tu tabla
        ]); 
        User::create([
            'name' => 'Lucas',
            'email' => 'lucas@example.com',
            'password' => Hash::make('12345678'), // Cambia la contraseña según tus necesidades
            'role' => 'coach', // Asegúrate de que este campo esté definido en tu tabla
        ]);
        User::create([
            'name' => 'nahuel zamudio ',
            'email' => 'nahuelarielz1234@outlook.com',
            'password' => Hash::make('12345678'), // Cambia la contraseña según tus necesidades
            'role' => 'client', // Asegúrate de que este campo esté definido en tu tabla
        ]); */
      /*   User::create([
            'name' => 'ariel ',
            'email' => 'ariel1234@outlook.com',
            'password' => Hash::make('12345678'), // Cambia la contraseña según tus necesidades
            'role' => 'client', // Asegúrate de que este campo esté definido en tu tabla
        ]); */
    /*     User::create([
            'name' => 'ariel2 ',
            'email' => 'arielz@outlook.com',
            'password' => Hash::make('12345678'), // Cambia la contraseña según tus necesidades
            'role' => 'client', // Asegúrate de que este campo esté definido en tu tabla
        ]); */
        User::create([
            'name' => 'lautaro ',
            'email' => 'lautaro@outlook.com',
            'password' => Hash::make('12345678'), // Cambia la contraseña según tus necesidades
            'role' => 'client', // Asegúrate de que este campo esté definido en tu tabla
        ]);
    }
}
