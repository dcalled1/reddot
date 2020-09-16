@extends('layouts.base')

@section("title", $announcement['title'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                @if (Auth::user()->id == $announcement['author_id'])
                    <div class="ml-auto row">
                        <form method="POST" action="{{ route('announcement.delete') }}" class="mr-2">
                            @csrf                       
                            <input type="hidden" value="{{ $announcement['id'] }}" name="id" />
                            <input type="submit" value="Delete Announcement" class="btn btn-danger" />
                        </form>
                        
                        <a href="{{ route('announcement.update', [$announcement['community_id'], $announcement['id']] ) }}" class="btn btn-primary">Update Announcement</a>
                    </div>
                @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">{{ $announcement['title'] }}</h1>
                            <h4 class="text-center">Author: {{ $announcement['author']->name }}</h3>
                            <br>
                            <p class="test-justify"> {{ $announcement['content'] }}</p>
                            <div class="d-flex">
                                <div class="row ml-auto mt-5">
                                    <h6>Tags: {{ $announcement['tags'] }}</h6>
                                    <h6 class="ml-2">Topics: {{ $announcement['topics'] }}</h6>
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
