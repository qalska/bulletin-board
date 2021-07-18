@extends('layouts.main-layout')

@section('title', isset($category) ? $category['title'] : 'Bulletin Board')

@section('ads_title', isset($category) ? 'Newest ads in a category ' . $category['title'] : 'Newest ads')

@section('header')
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="fs-3 navbar-brand" href="/">Bulletin Board</a>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <div>
                    <ul class="navbar-nav">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/category/{{ $category['title'] }}"> 
                                {{$category['title']}} 
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>

                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/home">My profile</a>
                                <a class="dropdown-item" href="/ad/create">Create a new ad</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <form action=" {{ route('search') }} " method="get">
        <div class="input-group mt-4 mx-auto w-75">
            <select class="form-select col-2" name="category_id" aria-label="Default select example">
                <option value="0" selected>Category</option>

                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="search" placeholder="Search ads">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </div>
    </form>

</header>
@endsection

@section('content')
<div class="mt-4 mx-4">
    <h2>@yield("ads_title")</h2>

    <div class="mt-4">
        @forelse($ads as $ad)
        <div>
            <h3> <a href="/ad/{{ $ad['id'] }}"> {{ $ad['title'] }} </a></h3>
            <div>
                <div class="h-100">
                    <img class="newest-ads__img" src="/img/{{ $ad['image'] }}" alt="{{ $ad['image'] }}">
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
            <p class="fs-3 fw-bold font-monospace text-danger">Ads not found!</p>
        </div>
        @endforelse
    </div>

</div>

@endsection