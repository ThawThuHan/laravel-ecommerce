@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/product-card.css">
    <link rel="stylesheet" href="/css/splide.min.css">
@endsection

@section('content')
<div class="bg-light">
    <div class="container">
        <div class="row g-0 my_fontpage bg-success">
            <div
                class="col-12 col-lg-5 d-flex flex-column justify-content-center align-items-center align-items-lg-start py-3 py-lg-5 px-3 px-lg-5">
                <h1 class="text-white">
                    Online Shopping
                </h1>
                <h3 class="text-white">your name</h3>
                <p class="text-white d-none d-lg-block d-md-block d-xl-block" style="text-align: justify;">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos maxime officiis fugiat
                    possimus
                    aliquam expedita debitis doloremque eveniet praesentium architecto! Nostrum mollitia deserunt,
                    reprehenderit repudiandae et nobis est dignissimos molestias.
                </p>
                {{-- <a href="" class="btn btn-outline-light rounded-pill" style="width: 100px;">Shop Now</a> --}}
                <form action="" class="me-2">
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control" placeholder="Search your product...">
                        <button class="input-group-text btn btn-outline-light"><i
                                class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-12 col-lg d-flex justify-content-center">
                <img src="/assets/images/undraw_working_remotely_jh40.svg" alt="">
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <h4 class="title-text">Categories</h4>
        <x-category-slide />
    </div>

    <div class="container mb-4">
        <div class="d-flex justify-content-between">
            <h4 class="title-text">What New in Store</h4>
            <a href="">see all >></a>
        </div>
        <div class="row g-3">
            @foreach ($latest as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>

    <div class="container mb-4">
        <div class="d-flex justify-content-between">
            <h4 class="title-text">Apple Products</h4>
            <a href="">see all >></a>
        </div>
        <div class="row g-3">
            @foreach ($apple as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>

    <div class="container mb-4">
        <div class="d-flex justify-content-between">
            <h4 class="title-text">Most People's like</h4>
            <a href="">see all >></a>
        </div>
        <div class="row g-3">
            @foreach ($popular as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/js/splide.min.js"></script>
    <script>
        var splide = new Splide( '.splide', {
          type   : 'loop',
          perPage: 5,
          perMove: 1,
          gap: '20px',
          arrows : false,
          autoplay: true,
        } );

        splide.mount();
    </script>
@endsection
