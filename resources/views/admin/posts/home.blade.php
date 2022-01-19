@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>{{ __('Lista Posts') }}</h1>
                    <button class="btn btn-warning"><a class="text-dark" href="{{ route('admin.posts.create') }}">Crea un nuovo Post</a></button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    @foreach ($postsList as $info_post)
                    {{ __('Post') }}
                    <ul>
                        <li>{{ $info_post['title']}}</li>
                        <li>{{ $info_post['subtitle']}}</li>
                        <li>{{ $info_post['content']}}</li>
                        <li>{{ $info_post['author']}}</li>
                        <li>{{ $info_post['category']}}</li>
                    </ul>
                    <button class="btn btn-primary"><a class="text-light" href="{{ route('admin.posts.show', $info_post->id)}}">Dettagli Post</a></button>
                    <button class="btn btn-secondary"><a class="text-light" href="{{ route('admin.posts.edit',  $info_post->id )}}">Modifica Post</a></button>

                     <hr>   
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
