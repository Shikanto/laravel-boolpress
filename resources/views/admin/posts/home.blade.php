@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Dati Post') }}
                    @foreach ($postsList as $info_post)
                    <ul>
                        <li>{{ $info_post['title']}}</li>
                        <li>{{ $info_post['subtitle']}}</li>
                        <li>{{ $info_post['content']}}</li>
                        <li>{{ $info_post['author']}}</li>
                        <li>{{ $info_post['category']}}</li>
                    </ul>
                     <hr>   
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
