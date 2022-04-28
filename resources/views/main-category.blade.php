@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="/css/product-card.css">
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($subCategories as $category)
            <div class="container mb-4">
                <h3>{{$category->name}}</h3>
                <div class="row">
                    @forelse($category->products as $product)
                        <div class="col-auto">
                            <x-product-card :product="$product" />
                        </div>
                    @empty
                        <p>No Product yet here!</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
@endsection