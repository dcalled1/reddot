@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                Announcement
                <a href="{{ route('announcement.create', $data['community'] ) }}" class="ml-auto btn btn-primary">Create Announcement</a>
                
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
