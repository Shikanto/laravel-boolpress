<?php

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class SetPostsSlug extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $slug = Str::slug($post->title); //qui dò allo slug il valore del title di post è la classe STR lo rende "leggibile" dall'URL

            $alreadyExists = Post::where("slug", $slug)->first(); //controllo se esiste un post con lo stesso slug 
            $counter = 1; // con il first si ferma e prende il primo che trova non già esistente

            while ($alreadyExists) {
                $newSlug = $slug . "-" . $counter; //genero un nuovo slug

                $alreadyExists = Post::where("slug", $newSlug)->first(); //cerchiamo se il nuovo slug creato già esiste

                $counter++;

                if (!$alreadyExists) { //se non è stato trovato alcun post, salvo il nuovo slug dentro la variabile $slug
                    $slug = $newSlug;
                }
            }
            $post->slug = $slug;
            $post->save();
        }
    }
}
