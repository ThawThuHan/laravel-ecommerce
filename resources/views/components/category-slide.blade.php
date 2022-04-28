<div class="splide my-4" role="group" aria-label="Splide Basic HTML Example">
  <div class="splide__track">
        <ul class="splide__list">
            @foreach ($categories as $category)
            <li class="splide__slide" >
                <a href="/categories/{{$category->id}}">
                    <div class="main-category">
                        <img src="/storage/{{ $category->image }}" alt="">
                        <h5 class="title-text">{{ $category->name }}</h5>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
  </div>
</div>