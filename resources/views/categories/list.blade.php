<ul class="sidebar-category">
    @foreach($categories as $category)
    <li class="sidebar-category__item"><a href="{{$category->url()}}" class="sidebar-category__item__link">{{$category->name}}</a></li>
    @endforeach
</ul>
