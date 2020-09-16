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
                        <form method="POST" action="{{ route('post.delete') }}" class="mr-2">
                            @csrf                       
                            <input type="hidden" value="{{ $post['id'] }}" name="id" />
                            <input type="submit" value="Delete Post" class="btn btn-danger" />
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
                                <div class="row ml-auto my-5">
                                    <h6 class="">Tags: {{ $post['tags'] }}</h6>
                                    <h6 class="mx-5">Topics: {{ $post['topics'] }}</h6>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('comment.create', [$post['community_id'], $post['id']]) }}">Comment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($post->comments as $comment)
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="row">
                                    <div class="mr-auto">
                                        Comment By: {{ $comment->author->name }}
                                    </div>
                                    <div class="ml-auto">
                                        {{ $comment->created_at }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    {{ $comment->content }}
                                </div>
                                @if (Auth::user()->id == $comment->author->id)
                                    <div class="d-flex">
                                        <div class="ml-auto row">
                                            <a href="{{ route('comment.update', [$post['community_id'], $post['id'], $comment['id']]) }}" class="btn btn-link">Edit</a>
                                            <form action="{{ route('comment.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $comment->getId() }}" name="id">
                                                <input type="hidden" value="{{ $post['community_id'] }}" name="community_id">
                                                <input type="hidden" value="{{ $post['id'] }}" name="post_id">
                                                <input type="submit" value="Delete" class="btn btn-link">
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
