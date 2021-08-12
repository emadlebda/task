<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_manager' => true,
        ]);
    }
}
