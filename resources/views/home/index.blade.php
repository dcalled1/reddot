@extends('layouts.base')

@section('content')
<div class="container my-auto mx-auto">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex">
                <p>{{ __('Home') }}</p>
            </div>
            <div class="card-body">
                <h1 class="text-center pt-5">{{ __('Welcome To Our Forum!') }}</h1>
                <div class="row my-5 py-5">
                    <div class="col-lg-4 col-12">
                        <div class="subtitle">
                            {{ __('Communities') }}
                            <div class="content">
                                {{ __('We offer a great diversities of communities, which let you categorize different posts in our forum, some of these are Videogames, Programming, Cooking, Music and others.') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="subtitle">
                            {{ __('Posts') }}
                            <div class="content">
                                {{ __('All of our posts need to be part of a community and it can have tags and/or topics to make it easier for our users to find the content they desire.') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="subtitle">
                            {{ __('Announcements') }}
                            <div class="content">
                                {{ __('We will do different Announcements on each community which may will be of an important matter, so we suggest you to always be paying attention to them.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
