@extends('layouts.admin-master')

@section('content')
    <h1>Create Main Category</h1>

    @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="/admin/category">back</a>

    <form class="col-12 col-md-6 mt-4" action="/admin/category" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="Category name...." autofocus>
            @error('name')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="image">
            @error('image')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary">submit</button>
    </form>
@endsection