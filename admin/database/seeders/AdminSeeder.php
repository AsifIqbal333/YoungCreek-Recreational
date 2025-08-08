<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => UserRole::ADMIN->value,
            'first_name' => 'Quintessa',
            'last_name' => 'Macias',
            'name' => 'Admin',
            'email' => 'admin@youngcreekrec.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@youngcreekrec.com')
        ]);
    }
}
