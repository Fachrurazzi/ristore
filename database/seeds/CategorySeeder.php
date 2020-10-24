<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'Apple',
                'slug' => 'apple'
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung'
            ],
            [
                'name' => 'Oppo',
                'slug' => 'oppo'
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi'
            ],
            [
                'name' => 'Realme',
                'slug' => 'realme'
            ],
            [
                'name' => 'Vivo',
                'slug' => 'vivo'
            ],
            [
                'name' => 'Asus',
                'slug' => 'asus'
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo'
            ],
            [
                'name' => 'Sony',
                'slug' => 'sony'
            ],
            [
                'name' => 'Entry Level',
                'slug' => 'entry-level'
            ],
            [
                'name' => 'Mid Range',
                'slug' => 'mid-range'
            ],
            [
                'name' => 'Flagship',
                'slug' => 'flagship'
            ]
        ];

        Category::insert($categories);
    }
}
