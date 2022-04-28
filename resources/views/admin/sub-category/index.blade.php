@extends('layouts.admin-master')

@section('content')
    <div class="mx-2">
        <h1>{{ $mainCategory->name }} - Sub-Categories</h1>

        @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session('status') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <span><b>Total</b> : 5</span>
            <a href="{{ route('category.sub-category.create', $mainCategory->id) }}" class="btn btn-sm btn-primary">+ Add Category</a>
        </div>
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Products</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($subCategories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ count($category->products) }}</td>
                <td>
                  <a href="{{ route('sub-category.edit', $category->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                  <form class="d-inline-block" id="category-delete" action="{{ route('sub-category.destroy', $category->id) }}" method="POST">
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