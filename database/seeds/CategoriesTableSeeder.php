<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Music';
        $category->save();

        $category = new Category();
        $category->name = 'Movies';
        $category->save();

        $category = new Category();
        $category->name = 'Travel';
        $category->save();

        $category = new Category();
        $category->name = 'Food';
        $category->save();
    }
}
