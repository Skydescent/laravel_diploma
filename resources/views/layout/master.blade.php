<!--END-->
<!--END--><!DOCTYPE html><!--[if IE 7]>
<html class="ie7" lang="ru">
<![endif]-->
<!--[if IE 8]>
<html class="ie8" lang="ru">
<![endif]-->
<!--[if IE 9]>
<html class="ie9" lang="ru">
<![endif]-->
<!--[if IE 10]>
<html class="ie10" lang="ru">
<![endif]-->
<!--[if IE 11]>
<html class="ie11" lang="ru">
<![endif]-->
<!--[if gt IE 11]><!--> <html lang="ru"> <!--<![endif]-->
<head>
    <title>@yield('title', 'Товарный агрегатор Megano')</title>
    <meta name="description" content="Товарный агрегатор Megano ">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link href="favicon.ico" rel="shortcut icon">
    <link rel="preload" href="{{asset('assets/fonts/Roboto/Roboto-Regular.woff')}}" as="font">
    <link rel="preload" href="{{asset('assets/fonts/Roboto/Roboto-Italic.woff')}}" as="font">
    <link rel="preload" href="{{asset('assets/fonts/Roboto/Roboto-Bold.woff')}}" as="font">
    <link rel="preload" href="{{asset('assets/fonts/Roboto/Roboto-Bold_Italic.woff')}}" as="font">
    <link rel="preload" href="{{asset('assets/fonts/Roboto/Roboto-Light.woff')}}" as="font">
    <link rel="preload" href="{{asset('assets/fonts/Roboto/Roboto-Light_Italic.woff')}}" as="font">
    <link rel="stylesheet" href="{{asset('assets/css/fonts.css?v=98987060')}}">
    <link rel="stylesheet" href="{{asset('assets/css/basic.css?v=98987060')}}">
    <link rel="stylesheet" href="{{asset('assets/css/extra.css?v=98987060')}}">
    <script src="{{asset('assets/plg/CountDown/countdown.js')}}"></script><!--[if lt IE 9]>
    <script src="{{asset('http://html5shiv.googlecode.com/svn/trunk/html5.js')}}"></script><![endif]-->
</head>
<body class="Site">
<!--if lt IE 8
p.error-browser
    | Ваш браузер&nbsp;
    em устарел!&nbsp;
    a(href="http://browsehappy.com/") Выберите новую версию
        +s
        | браузера здесь&nbsp;
    | для правильного отображения сайта.
-->

@include('layout.header')

<div class="Middle Middle_top">
    @includeUnless(request()->routeIs('banners'), 'layout.breadcrumbs')

    @yield('content')
</div>

@include('layout.footer')

<!--+Middle-->
<!--    +div.-top-->
<!--        +breadcrumbs('Главная','Портфолио')-->
<!--    +Article('portfolio')-->
<!---->
<script src="{{asset('assets/plg/jQuery/jquery-3.5.0.slim.min.js')}}"></script>
<script src="{{asset('assets/plg/form/jquery.form.js')}}"></script>
<script src="{{asset('assets/plg/form/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets/plg/range/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('assets/plg/Slider/slick.min.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body></html>
