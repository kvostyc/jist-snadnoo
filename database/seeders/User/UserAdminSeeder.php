<?php

namespace Database\Seeders\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Daniel Ibrahim',
            'email' => 'daniel@ibrahim.sk',
            'password' => Hash::make('snadnee'),
            'is_admin' => true,
        ]);
    }
}
