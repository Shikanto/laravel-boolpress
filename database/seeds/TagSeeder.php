<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Fantasy', 'Fantascienza', 'Sci-fi', 'Premiato', 'storia vera'];
	        foreach ($tags as $tag) {
                $new_tag = new Tag();
                $new_tag->name = $tag;
                $new_tag->save();
        }
    }
}
