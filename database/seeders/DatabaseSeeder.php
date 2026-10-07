<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed default roles
        foreach (['Member', 'Organizer', 'Admin'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Seed default categories
        foreach (['Football', 'Running', 'Tennis', 'Basketball', 'Cycling', 'Swimming'] as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]);
        }
        
    }
}