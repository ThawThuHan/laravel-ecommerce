<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .wrapper {
            display: flex;
            width: 100%;
        }
        
        .side-menu {
            width: 20%;
        }

        .menu {
            height: 100vh;
            background-color: #bbbbbb;
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .content {
            width: 80%;
            padding: 0px 10px;
        }
    </style>
    @yield('style')
</head>
<body>
    <div class="wrapper">
        <div class="side-menu">
            <div class="menu">
                <h1 class="text-white">Admin Panel</h1>
                <div class="list-group w-75">
                  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Dashboard
                  </a>
                  <a href="/admin/category" class="list-group-item list-group-item-action">Categories</a>
                  <a href="/admin/products" class="list-group-item list-group-item-action">Products</a>
                  <a href="#" class="list-group-item list-group-item-action">Orders</a>
                  <a href="#" class="list-group-item list-group-item-action">Users</a>
                </div>
                <span>
                    Admin panel
                </span>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>
</html>