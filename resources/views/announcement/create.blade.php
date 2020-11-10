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
                        <li class="breadcrumb-item"><a href="{{ route('community.index') }}">Communities</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('community.show', $data['community']->id) }}">{{ $data["community"]->name }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('announcement.index', $data['community']->id) }}">Announcements</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Announcement</li>
                    </ol>
                </nav>
                Create Announcement</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Create Announcement Form -->
                <form method="POST" action="{{ route('announcement.save') }}">
                    <div class="form-group">
                        @csrf                       
                        <label for="title">Title:</label>
                        <input type="text" placeholder="Title of the announcement" name="title" class="form-control" value="{{ old('title') }}" />
                        <input type="hidden" value="{{ Auth::user()->id }}" name="author_id" />
                        <input type="hidden"  value="{{ $data['community']->id }}" name="community_id" />
                        <label for="content">Content:</label>
                        <textarea name="content" class="form-control" rows="20" cols="30"></textarea>
                        <label for="tags">Tags:</label>
                        <input type="text" name="tags" value="{{ old('tags') }}" class="form-control"/>
                        <label for="topics">Topics:</label>
                        <input type="text" name="topics" placeholder="Announcement Topics" value="{{ old('topics') }}" class="form-control"/>
                        <label for="expire">Expiration Date:</label>
                        <input type="date" name="expire" value="{{ old('topics') }}" class="form-control"/>
                        <input type="submit" value="Create" class="btn btn-primary mt-3"/>

                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
