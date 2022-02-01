<?php

namespace App\Http\Controllers\Admin;

//importo i modelli Category, Post, Tag
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{


    private function generateSlug($title)
    {
        $slug = Str::slug($title);

        $alreadyExists = Post::where("slug", $slug)->first(); //controllo se esiste un post con lo stesso slug
        $counter = 1; //first() si ferma e prende al primo che trova

        while ($alreadyExists) {
            $newSlug = $slug . "-" . $counter; //generiamo un nuovo slug

            $alreadyExists = Post::where("slug", $newSlug)->first(); //cerchiamo se nel db esiste già un elemento con il nuovo slug appena creato
            $counter++;

            if (!$alreadyExists) { // se non è stato trovato alcun post, salvo il nuovo slug dentro la variabile $slug
                $slug = $newSlug;
            }
           
            
        }
        return $slug;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsList = Post::paginate(4);
        $categories = Category::all();

        return view('admin.posts.home', [
            "postsList" => $postsList,
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();


        return view("admin.posts.create", [
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $newPost = new Post();
        $newPost->fill($data);
        unset($newPost->tags);
        $newPost->slug = $this->generateSlug($data["title"]);
        
        if ($request->file("coverImg")) {
            $newPost->coverImg = Storage::disk('public')->put("posts", $data["coverImg"]);
        }
      
        $newPost->author_id = Auth::user()->id; //uso la funzione del Model
        //dd($newPost);
        $newPost->save();
        
        
        
        if(array_key_exists('tags', $data)) {
            $newPost->tags()->sync($data["tags"]);
        }
        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where("slug", $slug)->first();

        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', [
            "post" => $post,
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug) {

        $post = Post::where("slug", $slug)->first();
        $formData = $request->all();
        $oldTitle = $post->title;
        $titleChanged = $oldTitle !== $formData["title"];
        $oldCoverImg = $post->coverImg;

        
        /* $post->update($formData); */
        $post->fill($formData);
        unset($post->tags);

        if ($request->file("coverImg")) {
            if($oldCoverImg){
              Storage::delete($oldCoverImg);
            }
            
            $post->coverImg = Storage::put("posts", $formData["coverImg"]); //qui prendo il file che abbiamo caricato nel form lo metterà in app/public e crea una cartella posts e ci salverà dentro il file
            //$post->coverImg = $request->file("coverImg")->store("posts");
        }

        if ($titleChanged) {
            $post->slug = $this->generateSlug($formData["title"]);
        }

        $post->save();


        if (array_key_exists("tags", $formData)) {
            $post->tags()->sync($formData["tags"]);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $post->tags()->detach(); //se non scrivo questa riga avrò un errore di integrity perchè devo detachare la foreign key prima di cancellare il post
        $post->delete();
        return redirect()->route('admin.posts.index')->with(["status" => "Post cancellato correttamente"]);
    }
}
