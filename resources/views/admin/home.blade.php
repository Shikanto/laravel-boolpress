@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home - Admin - Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button><a href="{{ route('admin.posts.index')}}">Vai a tutti i posts</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
