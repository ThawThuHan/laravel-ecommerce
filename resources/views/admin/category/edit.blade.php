@extends('layouts.admin-master')

@section('content')
    <h1>Edit Main Category</h1>

    <form class="col-12 col-md-6 mt-4" action="/admin/category/{{ $mainCategory->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="Category name...." value="{{ $mainCategory->name }}" autofocus>
            @error('name')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <img src="/storage/{{ $mainCategory->image }}" alt="" width="100" height="100" >
        <div class="mb-3">
            <input type="hidden" name="old_image" value="{{ $mainCategory->image }}">
            <input class="form-control" type="file" name="image">
            @error('image')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary">submit</button>
    </form>
@endsection