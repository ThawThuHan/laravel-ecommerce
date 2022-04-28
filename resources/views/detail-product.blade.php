@extends('layouts.master')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/detail-product.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @php
                    $images = explode(",", $product->images)
                @endphp
                <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                    @if (count($images) <= 1)
                        <img src="/storage/{{$images[0]}}" alt="" width="100%">
                    @else
                    <div class="my-container">
                        @foreach ($images as $image)
                        <div class="mySlide">
                            <img src="/storage/{{$image}}" alt="" width="100%">
                        </div>
                        @endforeach
                        <div>
                            <button onclick="event.preventDefault(); plusSlides(-1)" class="button my-button"><i class="fa-solid fa-circle-chevron-left"></i></button>
                            <button onclick="event.preventDefault(); plusSlides(1)" class="button my-button"><i class="fa-solid fa-circle-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto d-flex">
                            @foreach ($images as $index=>$image)
                                <div class="demo cursor" onclick="currentSlide({{$index + 1}})">
                                    <img class="img-thumbnail" src="/storage/{{$image}}" alt="" width="100%">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-8">
                    <h4>{{$product->name}}</h4>
                    <h6>Price - {{ $product->price }} Ks</h6>
                    <p>Stock - {{ $product->stock }}/ Order - {{ $product->order_count }}</p>
                    <div class="count">
                        <button onclick="increment()" class="my-button font"><i class="fa-solid fa-plus"></i></button>
                        <span class="mx-2 font" id="value">1</span>
                        <button onclick="decrement()" class="my-button font"><i class="fa-solid fa-minus"></i></button>
                    </div>
                    <div class="mt-4">
                        <button onclick="addToCart({{$product->price}})" class="btn btn-outline-success font"><b>Add to Cart</b></button>
                        <button class="btn btn-outline-secondary font"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <form id="cart" action="/cart/add" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="quantity" id="quantity">
                        <input type="hidden" name="total" id="total">
                    </form>
                </div>
            </div>
            <div>
                <p>
                    <pre>{{$product->description}}</pre>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/detail-product.js"></script>
    <script>
        
    </script>
@endsection