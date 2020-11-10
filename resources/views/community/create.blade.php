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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create Community') }}</li>
                        </ol>
                    </nav>
                    <p class="ml-5">{{ __('Create Community') }}</p>
                </div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Create Post Form -->
                <form method="POST" action="{{ route('community.save') }}">
                    <div class="form-group">
                        @csrf                       
                        <label for="name">{{ __('Name') }}:</label>
                        <input type="text" placeholder="Name of the community" name="name" class="form-control" value="{{ old('name') }}" />
                        <input type="hidden" value="{{ Auth::user()->getId() }}" name="admin_id" />
                        <label for="description">{{ __('Description') }}:</label>
                        <textarea name="description" class="form-control" rows="5" cols="30"></textarea>
                        <label for="topics">{{ __('Topics') }}:</label>
                        <input type="text" name="topics" placeholder="Community topics" value="{{ old('topics') }}" class="form-control"/>
                        <label for="preferredTags">{{ __('Preferred Tags') }}:</label>
                        <input type="text" name="preferredTags" placeholder="Preferred Tags" value="{{ old('preferredTags') }}" class="form-control"/>
                        <input type="submit" value="{{ __('Create') }}" class="btn btn-primary mt-3"/>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
