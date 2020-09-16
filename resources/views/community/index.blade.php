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
                        <div class="table-responsive-lg col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Topics</th>
                                        <th>Preferred Tags</th>
                                        <th>Administrator</th>
                                        <th># of Members</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data["communities"] as $c)
                                            <tr>
                                                <td><b><a href="{{ route('community.show', $c->getId()) }}">{{ $c->getName() }}</a></b></td>
                                                <td>{{ $c->getDescription() }}</td>
                                                <td>{{ $c->getTopics() }}</td>
                                                <td>{{ $c->getPreferredTags() }}</td>
                                                <td>{{ $c->admin->getEmail() }}</td>
                                                <td>{{ $c->countMembers() }} members</td>
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
