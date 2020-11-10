@extends('layouts.base')

@section("title", $announcement['title'])

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
                            <li class="breadcrumb-item"><a href="{{ route('community.show', $announcement['community_id'] ) }}">{{ $announcement->community()->get()[0]->name }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('announcement.index', $announcement['community_id']) }}">{{ __('Announcements') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $announcement->getTitle() }}</li>
                        </ol>
                    </nav>
                @if (Auth::user())
                    @if (Auth::user()->id == $announcement['author_id'])
                        <div class="row ml-auto">
                            <div class="mr-5">
                                <form method="POST" action="{{ route('announcement.delete') }}" class="mr-2">
                                    @csrf                       
                                    <input type="hidden" value="{{ $announcement['id'] }}" name="id" />
                                    <input type="submit" value="Delete Announcement" class="btn btn-danger" />
                                </form>
                            </div>
                            <div class="div">
                            <a href="{{ route('announcement.update', [$announcement['community_id'], $announcement['id']] ) }}" class="btn btn-primary">{{ __('Update Announcement') }}</a>
                            </div>
                        </div>
                    @endif
                @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">{{ $announcement['title'] }}</h1>
                            <h4 class="text-center">{{ __('Author') }}: {{ $announcement['author']->name }}</h3>
                            <br>
                            <p class="test-justify"> {{ $announcement['content'] }}</p>
                            <div class="d-flex">
                                <div class="row ml-auto mt-5">
                                    <h6>{{ __('Tags') }}: {{ $announcement['tags'] }}</h6>
                                    <h6 class="ml-2">{{ __('Topics') }}: {{ $announcement['topics'] }}</h6>
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
