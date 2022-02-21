<x-app-layout>
    <x-slot name="content">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Заказать</div>
                </div>
            </div>
            <div class="cart-product-list">
                <div class="cart-product-list__item">
                    <div class="cart-product__item__product-photo"><img src="{{$storage->url($product->preview_picture)}}" class="cart-product__item__product-photo__image"></div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a href="{{$product->url()}}">{{$product->name}}</a></div>
                    </div>
                    {{--<div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content">14.12.2016</div>
                    </div>--}}
                    <div class="cart-product__item__product-price"><span class="product-price__value">{{$product->price}} рублей</span></div>
                </div>
            </div>
            <h2>Заказать</h2>
            <form action="/orders/{{$product->id}}" method="post" class="form">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="form__field">
                    <label for="name"></label>
                    <input type="text" placeholder="Имя" name="name" id="name">
                </div>
                <div class="form__field">
                    <label for="email"></label>
                    <input type="email" placeholder="E-mail" name="email" id="email" value="{{$user->email}}">
                </div>
                <button type="submit" class="btn btn-blue">Заказать</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
