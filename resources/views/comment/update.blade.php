@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('util.message')
            <div class="card">
                <div class="card-header">Update Comment</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Create Post Form -->
                <form method="POST" action="{{ route('comment.save_update') }}">
                    <div class="form-group">
                        @csrf               
                        <input type="hidden" value="{{ $data['comment']->getId() }}" name="id" />        
                        <input type="hidden" value="{{ $data['community'] }}" name="community_id" />    
                        <input type="hidden" value="{{ $data['post'] }}" name="post_id" />    
                        <label for="content">Content:</label>
                        <textarea name="content" class="form-control" rows="20" cols="30">{{ $data['comment']->getContent() }}</textarea>
                        <input type="submit" value="Update" class="btn btn-primary mt-3"/>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection