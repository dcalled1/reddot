@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('util.message')
            <div class="card">
                <div class="card-header">Update Announcement</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Create Announcement Form -->
                <form method="POST" action="{{ route('announcement.save_update') }}">
                    <div class="form-group">
                        @csrf               
                        <input type="hidden" value="{{ $data['announcement']->getId() }}" name="id" />        
                        <label for="title">Title:</label>
                        <input type="text" placeholder="Title of the announcement" name="title" class="form-control" value="{{ $data['announcement']->getTitle() }}" />
                        <label for="content">Content:</label>
                        <textarea name="content" class="form-control" rows="20" cols="30">{{ $data['announcement']->getContent() }}</textarea>
                        <label for="tags">Tags:</label>
                        <input type="text" name="tags" value="{{ $data['announcement']->getTags() }}" class="form-control"/>
                        <label for="topics">Topics:</label>
                        <input type="text" name="topics" placeholder="announcement Topics" value="{{ $data['announcement']->getTopics() }}" class="form-control"/>
                        <label for="expire">Expiration Date:</label>
                        <input type="date" name="expire" value="{{ $data['announcement']->getExpire() }}" class="form-control"/>
                        <input type="submit" value="Update" class="btn btn-primary mt-3"/>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection