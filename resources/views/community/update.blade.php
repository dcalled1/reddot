@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('util.message')
            <div class="card">
                <div class="card-header">Update Community</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Create Post Form -->
                <form method="POST" action="{{ route('community.save_update') }}">
                    <div class="form-group">
                        @csrf               
                        <input type="hidden" value="{{ $data['community']->getId() }}" name="id" />        
                        <label for="title">Name:</label>
                        <input type="text" placeholder="Title of the post" name="title" class="form-control" value="{{ $data['community']->getName() }}" />
                        <label for="content">Description:</label>
                        <textarea name="content" class="form-control" rows="20" cols="30">{{ $data['post']->getContent() }}</textarea>
                        <label for="topics">Topics:</label>
                        <input type="text" name="topics" placeholder="Post Topics" value="{{ $data['community']->getTopics() }}" class="form-control"/>
                        <label for="preferredTags">Preferred Tags:</label>
                        <input type="text" name="preferredTags" value="{{ $data['community']->getPreferredTags() }}" class="form-control"/>
                        <input type="submit" value="Update" class="btn btn-primary mt-3"/>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection