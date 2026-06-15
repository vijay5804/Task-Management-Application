<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Work']);
        Category::create(['name' => 'Personal']);
        Category::create(['name' => 'Shopping']);
        Category::create(['name' => 'Health']);
        Category::create(['name' => 'Learning']);
    }
}