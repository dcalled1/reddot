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
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('community.index') }}">Communities</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('community.show', $data['community']->id) }}">{{ $data["community"]->name }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Announcements</li>
                            </ol>
                    </nav>
                    <p class="mx-auto">Announcements</p>
                    <div class="ml-auto">
                        <a href="{{ route('announcement.create', $data['community']->id ) }}" class="btn btn-primary">Create Announcement</a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive-lg col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Topics</th>
                                        <th>Tags</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data["announcement"] as $p)
                                            <tr>
                                                <td><b><a href="{{ route('announcement.show', [$p->getCommunity(), $p->getId()]) }}">{{ $p->getTitle() }}</a></b></td>
                                                <td>{{ $p->getTopics() }}</td>
                                                <td>{{ $p->getTags() }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
