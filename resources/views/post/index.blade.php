@extends('layouts.base')

@section("title", $data["title"])

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
                                <li class="breadcrumb-item"><a href="{{ route('community.show', $data['community']->id) }}">{{ $data["community"]->name }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Posts') }}</li>
                            </ol>
                    </nav>
                    <p class="mx-auto">{{ __('Posts in this community') }}: @if ($data["post"]->first()) {{ $data["post"]->first()->community->countPosts() }} @else 0 @endif</p>
                    <div class="ml-auto">
                        @if (Auth::user())
                            <a href="{{ route('post.create', $data['community']->id ) }}" class="btn btn-primary">{{ __('Create Post') }}</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Create Post') }}</a>
                        @endif
                    </div>               
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive-lg col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Topics') }}</th>
                                        <th>{{ __('Tags') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data["post"] as $p)
                                            <tr>
                                                <td><b><a href="{{ route('post.show', [$p->getCommunity(), $p->getId()]) }}">{{ $p->getTitle() }}</a></b></td>
                                                <td>{{ $p->getTopics() }}</td>
                                                <td>{{ $p->getTags() }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="justify-content-center mx-auto">
                            {!! $data["post"]->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
@endsection
