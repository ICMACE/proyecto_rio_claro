<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioDosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //php artisan db:seed --class=UsuarioDosSeeder
        User::create([
            'name' => 'RioClaro',
            'email' => 'correo@mail.com',
            'password' => Hash::make('root1234'),
        ]);
    }
}
