@extends('layouts.admin-master')

@section('content')
    <div class="mx-2">
        <h1>Product</h1>

        @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session('status') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <span><b>Total</b> : 5</span>
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">+ Add Product</a>
        </div>
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">images</th>
              <th scope="col">price</th>
              <th scope="col">stock</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->subCategory->name }}</td>
                  <td>
                    @php
                    $images = explode(",", $product->images)    
                    @endphp
                    @foreach ($images as $image)
                    <img src='{{ asset("/storage/${image}") }}' alt="" width="80" height="60"> 
                    @endforeach
                  </td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->stock }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="/admin/products/{{$product->id}}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                      <form class="d-inline-block" action="/admin/products/{{$product->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">delete</button>
                      </form>
                    </div>
                    
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection