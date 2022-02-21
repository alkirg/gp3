<header class="main-header">
    <div class="logotype-container"><a href="/" class="logotype-link"><img src="{{asset('img/logo.png')}}" alt="Логотип"></a></div>
    <nav class="main-navigation">
        <ul class="nav-list">
            @foreach($menu->roots() as $item)
            <li class="nav-list__item"><a href="{!! $item->url() !!}" class="nav-list__item__link">{!! $item->title !!}</a></li>
            @endforeach
        </ul>
    </nav>
    <div class="header-contact">
        <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
    </div>
    <div class="header-container">
        <div class="payment-container">
            <div class="payment-basket__status">
                <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
            </div>
        </div>
        <div class="authorization-block">@guest<a href="{{route('register')}}" class="authorization-block__link">Регистрация</a><a href="{{route('login')}}" class="authorization-block__link">Войти</a>@endguest @auth<span class="authorization-block__link">Здравствуйте, {{auth()->user()->name}}!</span><a href="{{route('logout')}}" class="authorization-block__link">Выйти</a>@endauth</div>
    </div>
</header>
