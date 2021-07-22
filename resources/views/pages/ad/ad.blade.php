@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between ml-5">
    <div class="w-50">
        <h2> {{ $ad['title'] }} </h2>
        <img class="ad__img w-100" src="{{ asset($ad['image']) }}" alt="{{ $ad['image'] }}">
    </div>

    <div class="fs-2 w-50 d-flex justify-content-center align-items-center">
        <div>
            <p> Author: {{ $ad->user['name'] }} </p>
            <p> Phone number: {{ $ad->user['phone_number'] }}</p>
            <p>
                Category: <a href="/category/{{ $ad->category['title'] }}"> {{ $ad->category['title'] }} </a> 
            </p>
            <p> Price: {{ $ad['price'] }} RUB </p>
        </div>
    </div>
</div>

<p class="mt-3 mx-5 fs-5"> {{ $ad['text'] }} </p>

@endsection