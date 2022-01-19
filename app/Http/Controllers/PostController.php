<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    function index() {
        $postsList = Post::all();
        return $postsList;
    }
}
