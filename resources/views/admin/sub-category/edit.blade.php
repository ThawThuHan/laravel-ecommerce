@extends('layouts.admin-master')

@section('content')
    <h1>Edit Sub Category</h1>

    <form class="col-12 col-md-6 mt-4" action="/admin/sub-category/{{ $subCategory->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="Category name...." value="{{ $subCategory->name }}" autofocus>
            @error('name')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary">submit</button>
    </form>
@endsection