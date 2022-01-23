@extends('layouts.admin')

@section('title_page', 'Modifica Post')

@section('content')
<div class="container">
    <h1>Modifica Post</h1>
    <form action="{{ route("admin.posts.update", $post->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo Post</label>
            <input type="text" id="title" class="form-control" name="title"
            value="{{ old('title') ?? $post->title}}">
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo Post</label>
            <input type="text" id="subtitle" class="form-control" name="subtitle"
            value="{{ old('subtitle') ?? $post->subtitle}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto Post</label>
            <textarea class="form-control" id="content" rows="5" name="content"
            >{!! $post->content !!}</textarea>
        </div>
        {{-- <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" id="author" class="form-control" name="author"
            value="{{ old('author') ?? $post->author}}">
        </div> --}}
        <div class="mb-3">
            <label for="coverImg" class="form-label">Copertina Post</label>
            <input type="text" id="coverImg" class="form-control" name="coverImg"
            value="{{ old('coverImg') ?? $post->coverImg}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria Post</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}" @if($category->id === $post->category_id) selected @endif>{{ $category->name }}</option>  
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tag Post</label>
            <select name="tags[]" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id}}" @if($post->tags->contains($tag)) selected @endif>{{ $tag->name }}</option>  
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-center ">
            <button class="btn btn-success" type=submit>Save Changes</button>
        </div>
    </form>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection