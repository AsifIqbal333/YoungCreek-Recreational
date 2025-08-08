<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin'
        ]);

        $userRole = Role::create([
            'name' => 'User'
        ]);

        User::whereNull('role_id')->update(['role_id' => $userRole->id]);
    }
}
