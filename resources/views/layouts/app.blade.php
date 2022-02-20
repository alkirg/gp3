<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> - {{ config('app.name', 'ГеймсМаркет') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="main-wrapper">
    @include('layouts.header')
    <div class="middle">
        @include('layouts.sidebar')
        <div class="main-content">
            {{$content}}
            <div class="content-bottom"></div>
        </div>
    </div>
    @include('layouts.footer')
</div>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
