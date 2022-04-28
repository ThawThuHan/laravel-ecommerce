<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Categories
</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($categories as $category)
      <li><a class="dropdown-item" href="/categories/{{$category->id}}">{{$category->name}}</a></li>
    @endforeach
</ul>