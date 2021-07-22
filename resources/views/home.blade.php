@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <!-- <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <a class="link mx-2" href="/">Go to main page →</a>
        </div> -->

        <h4>My ads</h4>

        <div class="mt-4">
            @forelse($ads as $ad)
            <div>
                <div class="d-flex justify-content-between">
                    <h3> <a href="/ad/{{ $ad['id'] }}"> {{ $ad['title'] }} </a></h3>
                    <div>
                        <a class="btn btn-success" href="/ad/edit/{{ $ad['id'] }}">Edit an ad</a>
                        <a class="btn btn-danger ml-2" href="/ad/delete/{{ $ad['id'] }}">Delete an ad</a>
                    </div>
                </div>
                <div>
                    <div class="h-100">
                        <img class="newest-ads__img" src="{{ asset($ad['image']) }}" alt="{{ $ad['image'] }}">
                        <div class="newest-ads__text h-100 fs-6 d-inline-block mx-3">
                            <p>Author: {{$ad->user['name']}} </p>
                            <p>
                                Category: <a href="/category/{{ $ad->category['title'] }}"> {{$ad->category['title']}} </a> 
                            </p>
                            <p>
                                Price: {{ $ad['price'] }} RUB
                            </p>
                        </div>
                    </div>
                    <p class="mt-2">{{ $ad['text'] }}</p>
                </div>
                <hr>
                @empty
                <div class="d-flex flex-column align-items-center">
                    <p class="fs-2 fw-bold font-monospace">You have no ads yet</p>
                    <a class="btn btn-primary w-25" href="/ad/create">Create a new ad</a>
                </div>
            </div>
            @endforelse
        </div>
</div>
@endsection
