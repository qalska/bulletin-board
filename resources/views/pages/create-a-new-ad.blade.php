@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center">
    <h4 class="mb-4">Create a new ad</h4>

    <form class="col-5" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="text" name="title" placeholder="Title" required>

        <select class="form-select mt-3" name="category_id" aria-label="Default select example" required>
            <option value="0" selected>Category</option>

            @foreach($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
            @endforeach
        </select>

        <input class="form-control mt-3" type="text" name="price" placeholder="Price" required>

        <input class="form-control mt-3" type="file" name="image">

        <textarea class="form-control mt-3" name="text" cols="30" rows="10" placeholder="Text" required></textarea>
        <div class="d-flex justify-content-end">  
            <button type="submit" class="btn btn-success mt-3 col-4">Create</button>
        </div>
    </form>
</div>

@endsection