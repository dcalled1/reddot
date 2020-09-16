@extends('layouts.base')

@section("title", $community->getName())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                @if (Auth::user()->id == $community->admin->getId())
                    <div class="ml-auto row">
                        <form method="POST" action="{{ route('community.delete') }}" class="mr-2">
                            <input type="hidden" value="{{ $community->getId() }}" name="id" />
                            <input type="submit" value="Delete Community" class="btn btn-danger">
                        </form>
                        <a href="{{ route('community.update', $community->getId()) }}" class="btn btn-primary">Update Community</a>
                    </div>
                @endif
                </div>

                <div class="card-body">
                    <form action="{{ route('community.join', $community->getId()) }}" method="POST">
                        @csrf
                        <input type="text" hidden name="community_id" value="{{ community->getId() }}"/>
                        <button class="btn btn-primary" type="submit">Join</button>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">{{ $community['name'] }}</h1>
                            <h4 class="text-center">Admin: {{ $community->admin->getEmail() }}</h3>
                            <br>
                            <p class="test-justify"> {{ $community['description'] }}</p>
                            <div class="d-flex">
                                <h6>Topics: {{ $community['topics'] }}</h6><br>
                                <h6 class="ml-2">Prefered Tags: {{ $community['preferredTags'] }}</h6><br>
                                <h6>Members</h6>
                                <ul>
                                    @foreach ($community->members as $m)
                                        <li>$m->getEmail()</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
