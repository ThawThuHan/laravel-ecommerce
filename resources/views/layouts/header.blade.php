<div class="container-fluid sticky-top bg-light">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg bg-light">
            <div class="navbar-text">
                <span class="">
                    <a href="" class="navbar-brand">Ecommerce Site</a>
                </span>
            </div>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbar-container">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-container">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="/home" class="nav-link text-success">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-success">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-success">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-success">Contact</a>
                    </li>
                </ul>
                <div class="mt-3 mt-lg-0">
                    <a href="/cart" class="btn btn-sm btn-outline-success position-relative">
                        <i class="fa fa-cart-plus">
                        </i>
                        {{-- <span
                            class="badge position-absolute bottom-50 start-100 bg-danger translate-middle rounded-circle">5</span> --}}
                        <x-cart-icon></x-cart-icon>
                    </a>
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-success ms-2">
                        <i class="fa fa-user"></i>
                        login
                    </a>    
                    @endguest
                    @auth
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-success ms-2" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="fa fa-user"></i>
                        logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>