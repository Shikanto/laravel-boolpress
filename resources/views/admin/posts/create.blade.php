@extends('layouts.admin')

@section('title_page', 'Creazione Post')

@section('content')
<div class="container">
    <h1>Creazione Post</h1>
    <form action="{{ route("admin.posts.store" )}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo Post</label>
            <input type="text" id="title" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo Post</label>
            <input type="text" id="subtitle" class="form-control" name="subtitle">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto Post</label>
            <textarea class="form-control" id="content" rows="5" name="content"></textarea>
        </div>
        {{-- <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" id="author" class="form-control" name="author">
        </div> --}}
        <div class="mb-3">
            <label for="coverImg" class="form-label">Copertina Post</label>
            <input type="text" id="coverImg" class="form-control" name="coverImg">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria Post</label>
            <input type="text" id="category" class="form-control" name="category">
        </div>
        <div class="d-flex justify-content-center ">
            <button class="btn btn-dark mr-3" type="reset">Clear Form</button>
            <button class="btn btn-success" type=submit>Save Post</button>
        </div>
    </form>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection