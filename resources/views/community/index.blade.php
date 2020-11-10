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
                            <!--li class="breadcrumb-item"><a href="{{ route('community.index') }}">Library</a></li-->
                            <li class="breadcrumb-item active" aria-current="page">Communities</li>
                        </ol>
                    </nav>
                    <p class="mx-auto text-center">Communities</p>
                    <div class="ml-auto">
                        <a href="{{ route('community.create') }}" class="btn btn-primary text-center">Create Community</a>
                    </div>                                 
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
