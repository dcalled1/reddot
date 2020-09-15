@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                Posts
                <a href="#" class="ml-auto btn btn-danger">Delete Post</a>
                <a href="#" class="ml-auto btn btn-primary">Update Post</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <h1>{{ $post['title'] }}</h1>
                        <p> {{ $post['content'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
