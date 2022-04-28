@extends('layouts.admin-master')

@section('content')
    <h1>Create Product</h1>

    @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form class="col-8" action="/admin/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="Product name...." value="{{ old('name') }}">
            @error('name')
            <div  class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="description" id="" rows="5" placeholder="Product Detail" style="resize: none"></textarea>
            @error('description')
            <div  class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <select id="main-category" onchange="getSubCategory(this.value);" class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  @foreach ($mainCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
        <div class="mb-3">
            <input class="form-control" type="file" name="images[]" accept="image/png, image/gif, image/jpeg" id="" multiple>
            @error('images')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-control" type="number" name="price" placeholder="Product price....">
                @error('price')
                <div  class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <input class="form-control" type="number" name="stock" placeholder="stock....">
                @error('stock')
                <div  class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary">
            submit
        </button>
    </form>
@endsection

@section('script')
    <script>
        // function getSubCategory(mainCid){
        //     if(mainCid !== 0){
        //         const xHttp = new XMLHttpRequest();
        //         xHttp.onload = function(){
        //             let response = JSON.parse(this.responseText);
        //             const subSelect = document.querySelector('#sub-category');
        //             subSelect.innerHTML = "<option selected value=''>Open this select menu</option>";
        //             if(response.message === "success" && response.value.length) {
        //                 response.value.forEach(element => {
        //                     subSelect.innerHTML += `
        //                     <option value=${element.id}>${element.name}</option>`;
        //                 });
        //             }
        //         }
        //         xHttp.open('GET', "/admin/products/create?cid=" + mainCid);
        //         xHttp.send();
        //     }
        // }

        function getSubCategory(mainCid){
            fetch('/admin/sub-categories/get?cid='+mainCid)
            .then( response => response.json() )
            .then( response => {
                const subSelect = document.querySelector('#sub-category');                        
                subSelect.innerHTML = "<option selected value=''>Open this select menu</option>";
                if(response.message === "success" && response.value.length) {
                    response.value.forEach(element => {
                        subSelect.innerHTML += `
                        <option value=${element.id}>${element.name}</option>`;
                    });
                }
            } );
        }
    </script>
@endsection