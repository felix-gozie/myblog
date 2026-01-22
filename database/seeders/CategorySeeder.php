<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    public function run() {
        Category::insert([
            ['name' => 'Salary & Tax'],
            ['name' => 'Loans'],
            ['name' => 'Rent'],
            ['name' => 'Savings'],
        ]);
    }
}