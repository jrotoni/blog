<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->name = 'Music';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Movies';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Travel';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Food';
        $tag->save();
    }
}
