<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-color" content="#141414"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    @yield('styles')

    @stack('header.scripts')

    @php(wp_head())

</head>

<body @php(body_class()) >

@php(wp_body_open())

@php(do_action('get_header'))

<div id="app">
    <!-- PAGE LOADER -->
@include('partials.page-loader')

@include('partials.nav')
{{--        @include('partials.mega-nav')--}}
