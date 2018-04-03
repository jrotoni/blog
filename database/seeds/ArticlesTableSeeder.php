<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan make:seeder ArticlesTableSeeder
        // php artisan db:seed --class=ArticlesTableSeeder

        $faker = Faker\Factory::create();
        $limit = 50;

        for ($i=0; $i < $limit; $i++){
            $article = new Article();
            $article->title = $faker->words($nb = 3, $asText = true);
            $article->content = $faker->paragraph($nbSentences = 1, $variableNbSentences = true);
            $article->user_id = $faker->numberBetween($min = 1, $max = 21);
            $article->category_id = $faker->numberBetween($min = 1, $max = 5);
            $article->save(); 
        }
    }
}
