<x-app-layout>
    <x-slot name="content">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Заказ №{{$order->id}}</div>
                </div>
                <div class="content-head__search-block">
                    <div class="search-container">
                        <form class="search-container__form">
                            <input type="text" class="search-container__form__input">
                            <button class="search-container__form__btn">search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-main__container">
                @isset($order)
                <div class="cart-product-list">
                    <div class="cart-product-list__item">
                        <div class="cart-product__item__product-photo"><img src="{{$storage->url($order->product->preview_picture)}}" class="cart-product__item__product-photo__image"></div>
                        <div class="cart-product__item__product-name">
                            <div class="cart-product__item__product-name__content"><a href="{{$order->product->url()}}">{{$order->product->name}}</a></div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">{{$order->created_at}}</div>
                        </div>
                        <div class="cart-product__item__product-price"><span class="product-price__value">{{$order->total}} рублей</span></div>
                    </div>
                </div>
                <div class="cart-product-list">
                    <p>Данные заказа:</p>
                    <p>
                        Имя: {{$order->name}}<br>
                        E-mail: {{$order->email}}<br>
                        Дата заказа: {{$order->created_at}}
                    </p>
                </div>
                @else
                Заказ не найден
                @endisset
            </div>
        </div>
    </x-slot>
</x-app-layout>
