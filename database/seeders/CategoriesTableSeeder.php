<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Technology'
            ],
            [
                'name' => 'Politics'
            ],
            [
                'name' => 'Science'
            ],
        ];

        foreach($categories as $key => $value)
        {
            Category::create($value);
        }
    }
}
