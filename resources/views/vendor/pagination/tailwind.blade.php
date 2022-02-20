@if ($paginator->hasPages())
    <ul class="page-nav">
        @if ($paginator->onFirstPage())
        <li class="page-nav__item"><span class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></span></li>
        @else
        <li class="page-nav__item"><a href="{{ $paginator->previousPageUrl() }}" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
        @endif
        @foreach ($elements as $element)
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-nav__item"><span class="page-nav__item__link">{{ $page }}</span></li>
        @else
        <li class="page-nav__item"><a href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a></li>
        @endif
        @endforeach
        @endforeach
        @if ($paginator->hasMorePages())
        <li class="page-nav__item"><a href="{{ $paginator->nextPageUrl() }}" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
        @else
        <li class="page-nav__item"><span class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></span></li>
        @endif
    </ul>
@endif
