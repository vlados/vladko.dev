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
    <link rel="preload" href="{{ asset(mix('css/critical.css')) }}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    @endbot
    @unlessbot
    <link rel="stylesheet" href="{{ asset(mix('css/fonts.css')) }}">
    @livewireStyles(['nonce' => csp_nonce() ])
    <script nonce="{{  csp_nonce() }}">
        window.Wireui = {
            hook(hook, callback) {
                window.addEventListener(`wireui:${hook}`, () => callback())
            },
            dispatchHook(hook) {
                window.dispatchEvent(new Event(`wireui:${hook}`))
            }
        }
    </script>
    <script nonce="{{  csp_nonce() }}" src="{{ asset(mix('js/wireui.js')) }}"></script>
    <link rel="preload" href="{{ asset(mix('css/app.css')) }}" as="style">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    @production
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script nonce="{{  csp_nonce() }}" async
                src="https://www.googletagmanager.com/gtag/js?id=G-HE5Q9Q8M9S"></script>
        <script nonce="{{  csp_nonce() }}">
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', 'G-HE5Q9Q8M9S');
        </script>
    @endproduction
    @endbot

    <link rel="icon" href="{{ asset('images/icon.svg') }}" type="image/svg+xml">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @laravelPWA

</head>

<body class="min-h-screen antialiased bg-gray-50 print:bg-white" x-data="scrollToTop">
@unlessbot

<div
    class="fixed inset-0 z-50 flex flex-col items-center justify-center ease-linear bg-white bg-opacity-50 backdrop-blur-2xl white"
    x-transition:leave="transition ease-in delay-500" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-200" x-data="loading" x-show="show">
    <x-logo height="60" width="60" class="ml-2 fill-current animate-spin duration-2000" middle="text-gray-400"/>
    <div class="mt-5 text-base font-semibold text-gray-600">Loading ...</div>
</div>
@endbot
@yield('body')


@unlessbot
@livewireScripts(['nonce' => csp_nonce() ])
<x-livewire-alert::scripts/>
<button x-show="visibleScrollToTop" @click="clickTop" type="button" x-cloak
        class="fixed bottom-0 right-0 z-50 inline-flex items-center p-3 mb-10 mr-10 text-white bg-indigo-600 border-2 border-white rounded-full shadow-lg print:hidden hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-0 translate-y-32"
        x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 transform scale-0 translate-y-32">
    <!-- Heroicon name: outline/plus-sm -->
    <x-icon name="arrow-up" class="w-6 h-6"/>
</button>
@endbot
@bot
<script nonce="{{ csp_nonce() }}" src="{{ asset(mix('js/minimal.js')) }}" defer></script>
@else
    <script nonce="{{ csp_nonce() }}" src="{{ asset(mix('js/app.js')) }}" defer></script>
    @endbot

</body>

</html>
