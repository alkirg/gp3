<x-app-layout>
    <x-slot name="content">
        <div class="content-top">
            <div class="content-top__text">{{$category->description}}</div>
        </div>
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Игры в разделе {{$category->name}}</div>
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
                <div class="products-category__list">
                    @foreach($products as $product)
                    <div class="products-category__list__item">
                        <div class="products-category__list__item__title-product"><a href="#">{{$product->name}}</a></div>
                        <div class="products-category__list__item__thumbnail"><a href="{{$product->url()}}" class="products-category__list__item__thumbnail__link"><img src="{{$storage->url($product->preview_picture)}}" alt="Preview-image"></a></div>
                        <div class="products-category__list__item__description"><span class="products-price">{{$product->price}} руб.</span><a href="{{$product->cart()}}" class="btn btn-blue">Купить</a></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="content-footer__container">
                {{$products->links()}}
            </div>
        </div>
    </x-slot>
</x-app-layout>
