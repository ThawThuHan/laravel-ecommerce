@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </thead>
                  <tbody>
                    @foreach ($carts as $cart)
                    @php
                        $product = $cart->product;
                        $images = $product->images;
                        $images = explode(",", $images);
                    @endphp
                        <tr>
                            <td><img src="/storage/{{ $images[0] }}" alt="" width="100" height="100"></td>
                            <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->total }} Ks</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <div class="col-4">
                <div class="">
                    @php
                        $totalAmount = $carts->pluck('total')->reduce(function ($p, $n){
                            return $p + $n;
                        })
                    @endphp
                    <h4>Order Summary</h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Total Item : </span> <b>{{ count($carts) }} Pcs</b>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Total Amount : </span> <b>{{ $totalAmount }} Ks</b>
                    </div>
                    <button class="btn btn-success mt-3">Process to Check Out</button>
                </div>
            </div>
        </div>
    </div>
@endsection