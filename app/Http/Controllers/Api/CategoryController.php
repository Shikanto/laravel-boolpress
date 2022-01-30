<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy("name")->get();
        return response()->json($categories);
    }

    public function show($categoryId) {
        $category = Category::where("id", $categoryId)->with("posts")->first();

        if(!$category){
            throw new HttpException(404);
        }
        
        return $category;
    }
}
