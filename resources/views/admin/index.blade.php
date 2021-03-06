@extends('layouts.admin-master')

@section('style')

@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex mx-auto mt-4 mt-md-0">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <img class="rounded-circle me-3 d-none d-md-inline" src="/images/moon.jpeg" alt="" style="width: 50px; height: 50px;">
            <h4 class="mt-3 d-none d-md-inline">Admin</h4>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-evenly mt-3 mb-3">
    <div onclick="location.href='admin_home'" class="cursor d-flex justify-content-evenly align-items-center admin-box" style="width: 30%;">
        <div class="my-3">
            <h1 class="text-danger">54</h1>
            <p class="text-center">Customers</p>
        </div>
        <i class="fa-solid fa-users fs-2"></i>
    </div>
    <div onclick="location.href='admin_home'" class="cursor d-flex justify-content-evenly align-items-center admin-box" style="width: 30%;">
        <div class="">
            <h1 class="text-danger">79</h1>
            <p class="text-center">Products</p>
        </div>
        <i class="fa-solid fa-clipboard-list fs-2"></i>
    </div>
    <div onclick="location.href='admin_order'" class="cursor d-flex justify-content-evenly align-items-center admin-box" style="width: 30%;">
        <div class="">
            <h1 class="text-danger">124</h1>
            <p class="text-center">Orders</p>
        </div>
        <i class="fa-solid fa-bag-shopping fs-2"></i>
    </div>
</div>
@endsection