@extends('layouts.base')

@section("title", $post['title'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                @if (Auth::user()->id == $post['author_id'])
                    <div class="ml-auto row">
                        <form action="POST" class="mr-2">
                        @method('DELETE')
                            <input type="submit" value="Delete Post" class="btn btn-danger">
                        </form>
                        <a href="{{ route('post.update', [$post['community_id'], $post['id']] ) }}" class="btn btn-primary">Update Post</a>
                    </div>
                @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">{{ $post['title'] }}</h1>
                            <h4 class="text-center">Author: {{ $post['author']->name }}</h3>
                            <br>
                            <p class="test-justify"> {{ $post['content'] }}</p>
                            <div class="d-flex">
                                <div class="row ml-auto mt-5">
                                    <h6>Tags: {{ $post['tags'] }}</h6>
                                    <h6 class="ml-2">Topics: {{ $post['topics'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
