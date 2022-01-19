@extends('layouts.admin')

@section('title_page', 'Info Post #' . $post->id)

@section('content')
    <div class="container my-5">
        
        <div class="card mb-3 p-4 bg-dark text-light">
            <img src="{{$post['coverImg']}}" class="card-img-top border border-light" alt="...">
            <div class="card-body py-5">
                <h2>{{ strtoupper($post['title']) }}</h2>
                <h4 class="card-title">{{ strtoupper($post['subtitle'])}}</h4>
                <p class="card-text">{{ $post['content'] }}</p>
                <h5 class="card-text">{{ $post['author'] }}</h5>
                <h6 class="card-text text-muted">{{ $post['category'] }}</h6>
            </div>
            <div class="d-flex justify-content-center border-top border-light pt-4">
                <form class="mr-3" action="{{ route('admin.posts.edit', $post->id)}}" method="get">
                    @csrf
                                        
                    <button class="btn btn-primary" type= "submit">Modifica Post</button>
                </form>
                <form action="{{ route('admin.posts.destroy', $post->id)}}" method="post" class="form-delete">
                    @csrf
                    @method('delete')
                    
                    <button class="btn btn-danger" type= "submit">Elimina Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection   