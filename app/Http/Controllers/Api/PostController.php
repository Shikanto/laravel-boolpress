<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PostController extends Controller
{
    public function index() {
        $postsList = Post::with("category")->with("user")->with("tags")->paginate(4);
        sleep(2);

       /*  $postsList->each(function ($post) {
            $post->coverImg =  url("/storage/" . $post->coverImg);
          });
 */
        return $postsList;
    }

    public function show($slug) {
        $post = Post::where("slug", $slug)->first();

        if(!$post){
            throw new NotFoundHttpException("Post non trovato");
        }

        $post->coverImg = url("/storage/" . $post->coverImg); //nello show imposto l'url img lato backend invece nella home l'ho impostato lato front end usand '/storage/' + $post.coverImg

        return response()->json($post); //questo è equivalente a scrivere semplicemente return $post e poi in automatico verrà trasformato in json
    }
}
