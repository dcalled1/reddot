@extends('layouts.base')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex">
                Communities
                <a href="{{ route('community.create') }}" class="ml-auto btn btn-primary">Create Community</a>
                
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th># of Members</th>
                                        <th>Announcements</th>
                                        <th>Posts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data["communities"] as $c)
                                            <tr>
                                                <td><b><a href="{{ route('community.show', $c->getId()) }}">{{ $c->getName() }}</a></b></td>
                                                <td>{{ $c->countMembers() }}</td>
                                                <td><a href="{{ route('announcement.index', $c->getId()) }}">Click Here</a></td>
                                                <td><a href="{{ route('post.index', $c->getId()) }}">Click Here</a></td>
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
