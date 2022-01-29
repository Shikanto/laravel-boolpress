<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    function index() {
        $postsList = Post::with("category")->with("user")->with("tags")->paginate(4);
        return $postsList;
    }
}
