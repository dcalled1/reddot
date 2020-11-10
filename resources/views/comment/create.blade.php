@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('util.message')
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb mr-auto">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('community.index' ) }}">Communities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('community.show', $data['community'] ) }}">{{ $data['community_name'] }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('post.show', [$data['community'], $data['post']] ) }}">{{ $data['post_name'] }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Communities</li>
                        </ol>
                    </nav>
                    <p>Create Comment</p>
                </div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Create Post Form -->
                <form method="POST" action="{{ route('comment.save') }}">
                    <div class="form-group">
                        @csrf                       
                        <label for="content">Content:</label>
                        <input type="hidden" value="{{ Auth::user()->id }}" name="author_id" />
                        <input type="hidden"  value="{{ $data['post'] }}" name="post_id" />
                        <input type="hidden"  value="{{ $data['community'] }}" name="community_id" />
                        <textarea name="content" class="form-control" rows="20" cols="30"></textarea>
                        <input type="submit" value="Create" class="btn btn-primary mt-3"/>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
