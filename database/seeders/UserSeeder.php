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
        User::create([
            'name' => 'Admin ELISPENS',
            'email' => 'admin@elispens.com',
            'password' => Hash::make('password'),
            'is_validated' => true
        ]);

        User::create([
            'name' => 'Contoh Dosen 1',
            'email' => 'dosen1@elispens.com',
            'password' => Hash::make('password'),
            'is_validated' => true
        ])->lecturer()->create([
            'study_program_id' => 1,
            'nip' => '11111',
            'gender' => 'M'
        ]);

        User::create([
            'name' => 'Contoh Dosen 2',
            'email' => 'dosen2@elispens.com',
            'password' => Hash::make('password'),
            'is_validated' => true
        ])->lecturer()->create([
            'study_program_id' => 1,
            'nip' => '22222',
            'gender' => 'F'
        ]);
    }
}
