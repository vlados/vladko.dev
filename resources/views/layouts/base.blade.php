<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{!! SEO::generate() !!}

<!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles -->
    @bot
        @if(file_exists(base_path('public/css/critical.min.css')))
            <style>{{ file_get_contents(base_path('public/css/critical.min.css')) }}</style>
        @endif
        <link rel="preload" href="{{ asset(mix('css/app.css')) }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="styles.css"></noscript>
    @endbot
    @unlessbot
        <link rel="stylesheet" href="{{ asset(mix('css/fonts.css')) }}">
        @livewireStyles
        <script>window.Wireui = {hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
        <script src="{{ url(mix('js/wireui.js')) }}"></script>
        <link rel="preload" href="{{ asset(mix('css/app.css')) }}" as="style">
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    @endbot


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @laravelPWA

</head>

<body class="antialiased bg-gray-50 print:bg-white min-h-screen" x-data="scrollToTop">
@unlessbot

<div
    class="fixed inset-0 backdrop-blur-2xl bg-white white flex justify-center items-center z-50 bg-opacity-50 flex-col ease-linear"
    x-transition:leave="transition ease-in delay-500"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-200"
    x-data="loading" x-show="show">
    <x-logo height="60" width="60" class="fill-current ml-2 animate-spin duration-2000" middle="text-gray-400"/>
    <div class="text-base text-gray-600 font-semibold mt-5">Loading ...</div>
</div>
@endbot
@yield('body')


@unlessbot
@livewireScripts
<x-livewire-alert::scripts/>
<button x-show="visibleScrollToTop" @click="clickTop" type="button"
        class=" print:hidden inline-flex items-center p-3 rounded-full text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 fixed bottom-0 right-0 mr-10 mb-10 z-50 border-2 border-white shadow-lg"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-0 translate-y-32"
        x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 transform scale-0 translate-y-32"
>
    <!-- Heroicon name: outline/plus-sm -->
    <x-icon name="arrow-up" class="h-6 w-6"/>
</button>
@endbot
<!-- Scripts -->
<script src="{{ asset(mix('js/app.js')) }}" defer></script>

</body>
</html>
