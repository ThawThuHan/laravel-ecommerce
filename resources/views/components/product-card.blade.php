@props(['product'])
<div class="col-auto d-flex flex-column justify-content-center align-items-center">
    <a href="/products/{{$product->id}}" class="product-card">
        @php
            $images = explode(",", $product->images)
        @endphp
        <img src="/storage/{{ $images[0] }}" alt="">
        <div class="product-info">
            <h6>{{ $product->name }}</h6>
            Price - {{ $product->price }} Ks
        </div>
    </a>
</div>