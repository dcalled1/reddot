@extends('layouts.base')

@section("title", $community->getName())

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
                            <li class="breadcrumb-item active" aria-current="page">{{ $community->getName() }}</li>
                        </ol>
                    </nav>
                    @if (Auth::user())
                        <div class="ml-auto row">
                            <form action="{{ route('community.join') }}" method="POST">
                                @csrf
                                <input type="hidden" name="community_id" value="{{ $community->getId() }}"/>
                                <button class="btn btn-primary mr-2" type="submit">{{ __('Join Community') }}</button>
                            </form>
                        </div>
                        @if (Auth::user()->id == $community->admin->getId())
                                <form method="POST" action="{{ route('community.delete') }}" class="mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" hidden value="{{ $community->getId() }}" name="id" />
                                    <input type="submit" value="{{ __('Delete Community') }}" class="btn btn-danger">
                                </form>
                                <a href="{{ route('community.update', $community->getId()) }}" class="btn btn-primary">{ __('Update Community') }}</a>
                        @endif
                    @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">{{ $community['name'] }}</h1>
                            <h4 class="text-center">Admin: {{ $community->admin->getEmail() }}</h3>
                            <br>
                            <p class="ml-2">{{ __('Description') }}: {{ $community['description'] }}</p>
                            <p class="ml-2">{{ __('Topics') }}: {{ $community['topics'] }}</h6><br>
                            <p class="ml-2">{{ __('Preferred Tags') }}: {{ $community['preferredTags'] }}</p><br>
                            <h6>{{ __('Members') }}</h6>
                            <ul>
                                @foreach ($community->members as $member)
                                    <li>{{ $member->getEmail() }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
