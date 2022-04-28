@extends('layouts.admin-master')

@section('content')
    <h1>Edit Product</h1>

    @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form class="col-8" action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="Product name...." value="{{ $product->name }}">
            @error('name')
            <div  class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="description" id="" rows="5" placeholder="Product Detail" style="resize: none">{{ $product->description }}</textarea>
            @error('description')
            <div  class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <select id="main-category" onchange="getSubCategory(this.value, {{$product->id}});" class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  @foreach ($mainCategories as $category)
                    <option {{ $category->id === $product->subCategory->mainCategory->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-6">
                <select id="sub-category" name="sub_category_id" class="form-select" aria-label="Default select example">
                    <option value="" selected>Open this select menu</option>
                </select>
                @error('sub_category_id')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex flex-wrap mb-3">
            @foreach (explode(",", $product->images) as $img)
                <img class="mx-3" src="/storage/{{ $img }}" alt="" width="140" height="160">  
                <input type="hidden" name="old_images" value="{{$product->images}}">            
            @endforeach
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="images[]" accept="image/png, image/gif, image/jpeg" id="" multiple>
            @error('images')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-control" type="number" name="price" placeholder="Product price...." 
                value="{{ $product->price }}">
                @error('price')
                <div  class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <input class="form-control" type="number" name="stock" placeholder="stock...." value="{{ $product->stock }}">
                @error('stock')
                <div  class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary">
            edit
        </button>
    </form>
@endsection

@section('script')
    <script>
        window.onload = () => {
            getSubCategory("{{ $product->subCategory->mainCategory->id }}")
        }

        function getSubCategory(mainCid){
            fetch('/admin/sub-categories/get?cid='+mainCid)
            .then( response => response.json() )
            .then( response => {
                const subSelect = document.querySelector('#sub-category');                        
                subSelect.innerHTML = "<option selected value=''>Open this select menu</option>";
                if(response.message === "success" && response.value.length) {
                    response.value.forEach(element => {
                        subSelect.innerHTML += `
                        <option ${ element.id == "{{ $product->sub_category_id }}" ? "selected" : "" } value=${element.id}>${element.name}</option>`;
                    });
                }
            } );
        }
    </script>
@endsection