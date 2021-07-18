@extends('layouts.app')

@section('content')

<div class="d-flex flex-column align-items-center">

    <form class="col-5" action="/ad/{{ $ad['id'] }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="text" name="title" value="{{ $ad['title'] }}" required>

        <select class="form-select mt-3" name="category_id" aria-label="Default select example" required>
            <option value="0" selected>Category</option>

            @foreach($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
            @endforeach
        </select>

        <input class="form-control mt-3" type="text" name="price" value="{{ $ad['price'] }}" required>

        <input class="form-control mt-3" type="file" name="image">

        <textarea class="form-control mt-3" name="text" cols="30" rows="10" required>{{ $ad['text'] }}</textarea>
        <div class="d-flex justify-content-end">  
            <button type="submit" class="btn btn-success mt-3 col-4">Save</button>
        </div>
    </form>
</div>

@endsection