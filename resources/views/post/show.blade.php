@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                Posts
                <a href="{{ route('post.create') }}" class="ml-auto btn btn-primary">Create Post</a>
                
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
                                    @foreach ($data["post"] as $p)
                                            <tr>
                                                <td><b><a href="{{ route('p.showid', $p->getId()) }}">{{ $p->getTitle() }}</a></b></td>
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
