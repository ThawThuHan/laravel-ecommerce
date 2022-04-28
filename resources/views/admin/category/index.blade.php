@extends('layouts.admin-master')

@section('content')
    <div class="mx-2">
        <h1>Main Categories</h1>

        @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session('status') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <span><b>Total</b> : 5</span>
            <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">+ Add Category</a>
        </div>
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Image</th>
              <th scope="col">Sub-Categories</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mainCategories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td><img src="/storage/{{ $category->image }}" alt="" width="100" height="100"></td>
                <td><a href="/admin/category/{{ $category->id }}/sub-category">{{ count($category->subCategories) }}</a></td>
                <td>
                  <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                  <form class="d-inline-block" id="category-delete" action="/admin/category/{{ $category->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection