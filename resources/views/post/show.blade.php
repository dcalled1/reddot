@extends('layouts.base')

@section("title", $post['title'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                    <nav aria-label="breadcrumb mr-auto">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('community.index') }}">{{ __('Communities') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('community.show', $post['community_id'] ) }}">{{ $post->community()->get()[0]->name }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('post.index', $post['community_id']) }}">{{ __('Posts') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->getTitle() }}</li>
                        </ol>
                    </nav>
                @if (Auth::user())
                    
                    @if (Auth::user()->id == $post['author_id'])
                        <div class="row ml-auto">
                            <div class="mr-5">
                                <form method="POST" action="{{ route('post.delete') }}" class="">
                                    @csrf                       
                                    <input type="hidden" value="{{ $post['id'] }}" name="id" />
                                    <input type="submit" value="{{ __('Delete Post') }}" class="btn btn-danger" />
                                </form>

                            </div>
                            <div class="">
                                
                                <a href="{{ route('post.update', [$post['community_id'], $post['id']] ) }}" class="btn btn-primary">{{ __('Update Post') }}</a>
                            </div>
                        </div>   
                    @endif
                @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">{{ $post['title'] }}</h1>
                            <h4 class="text-center">{{ __('Author') }}: {{ $post['author']->name }}</h3>
                            <br>
                            <p class="test-justify"> {{ $post['content'] }}</p>
                        </div>
                    </div>
                    <div class="d-flex row my-5">
                        <h6 class="mr-auto pl-4">{{ __('Tags') }}: {{ $post['tags'] }} &nbsp; {{ __('Topics') }}: {{ $post['topics'] }}</h6>
                        <div class="row ml-auto pr-4">
                            <form action="{{ route('post.tweet') }}" method="POST" class="mr-5">
                                <button class="btn btn-primary">{{ __('Share on Twitter') }} &nbsp; <i class="fa fa-twitter"></i></button>
                            </form>
                            
                            @if (Auth::user())
                                <a href="{{ route('comment.create', [$post['community_id'], $post['id']]) }}">{{ __('Comment') }}</a>
                            @else
                                <a href="{{ route('register') }}">{{ __('Comment') }}</a>
                            @endif
                        </div>
                    </div>
                    @foreach($post->comments as $comment)
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="row">
                                    <div class="mr-auto">
                                        {{ __('Comment By') }}: {{ $comment->author->name }}
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
                                @if (Auth::user())
                                    @if (Auth::user()->id == $comment->author->id)
                                        <div class="d-flex">
                                            <div class="ml-auto row">
                                                <a href="{{ route('comment.update', [$post['community_id'], $post['id'], $comment['id']]) }}" class="btn btn-link">{{ __('Edit') }}</a>
                                                <form action="{{ route('comment.delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $comment->getId() }}" name="id">
                                                    <input type="hidden" value="{{ $post['community_id'] }}" name="community_id">
                                                    <input type="hidden" value="{{ $post['id'] }}" name="post_id">
                                                    <input type="submit" value="{{ __('Delete') }}" class="btn btn-link">
                                                </form>
                                            </div>
                                        </div>
                                    @endif
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
