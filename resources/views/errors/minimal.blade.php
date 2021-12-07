<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->

        <style>
            *,::after,::before{box-sizing:border-box;}
            body{margin:0;}
            body{font-family:system-ui,-apple-system,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji';}
            ::-moz-focus-inner{border-style:none;padding:0;}
            :-moz-focusring{outline:1px dotted ButtonText;}
            h1,p{margin:0;}
            *,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:currentColor;}
            :-moz-focusring{outline:auto;}
            h1{font-size:inherit;font-weight:inherit;}
            a{color:inherit;text-decoration:inherit;}
            svg{display:block;vertical-align:middle;}
            *,::after,::before{--tw-border-opacity:1;border-color:rgba(229,231,235,var(--tw-border-opacity));}
            .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border-width:0;}
            .mx-auto{margin-left:auto;margin-right:auto;}
            .mt-2{margin-top:.5rem;}
            .mt-6{margin-top:1.5rem;}
            .mt-8{margin-top:2rem;}
            .flex{display:flex;}
            .inline-flex{display:inline-flex;}
            .h-6{height:1.5rem;}
            .h-screen{height:100vh;}
            .w-6{width:1.5rem;}
            .w-full{width:100%;}
            .max-w-2xl{max-width:42rem;}
            .max-w-7xl{max-width:80rem;}
            .flex-shrink-0{flex-shrink:0;}
            .flex-grow{flex-grow:1;}
            .flex-row{flex-direction:row;}
            .flex-col{flex-direction:column;}
            .justify-center{justify-content:center;}
            .space-x-6>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1.5rem * var(--tw-space-x-reverse));margin-left:calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));}
            .bg-white{--tw-bg-opacity:1;background-color:rgba(255,255,255,var(--tw-bg-opacity));}
            .fill-current{fill:currentColor;}
            .px-4{padding-left:1rem;padding-right:1rem;}
            .py-16{padding-top:4rem;padding-bottom:4rem;}
            .pt-16{padding-top:4rem;}
            .pb-12{padding-bottom:3rem;}
            .text-center{text-align:center;}
            .text-sm{font-size:.875rem;line-height:1.25rem;}
            .text-base{font-size:1rem;line-height:1.5rem;}
            .text-4xl{font-size:2.25rem;line-height:2.5rem;}
            .font-medium{font-weight:500;}
            .font-semibold{font-weight:600;}
            .font-extrabold{font-weight:800;}
            .uppercase{text-transform:uppercase;}
            .tracking-tight{letter-spacing:-.025em;}
            .tracking-wide{letter-spacing:.025em;}
            .text-white{--tw-text-opacity:1;color:rgba(255,255,255,var(--tw-text-opacity));}
            .text-gray-500{--tw-text-opacity:1;color:rgba(107,114,128,var(--tw-text-opacity));}
            .text-gray-900{--tw-text-opacity:1;color:rgba(17,24,39,var(--tw-text-opacity));}
            .text-indigo-400{--tw-text-opacity:1;color:rgba(129,140,248,var(--tw-text-opacity));}
            .text-indigo-600{--tw-text-opacity:1;color:rgba(79,70,229,var(--tw-text-opacity));}
            .text-indigo-800{--tw-text-opacity:1;color:rgba(55,48,163,var(--tw-text-opacity));}
            .hover\:text-indigo-500:hover{--tw-text-opacity:1;color:rgba(99,102,241,var(--tw-text-opacity));}
            .hover\:text-indigo-600:hover{--tw-text-opacity:1;color:rgba(79,70,229,var(--tw-text-opacity));}
            .antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
            *,::after,::before{--tw-shadow:0 0 #0000;}
            *,::after,::before{--tw-ring-inset:var(--tw-empty, );--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59, 130, 246, 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;}
            @media (min-width:640px){
                .sm\:px-6{padding-left:1.5rem;padding-right:1.5rem;}
                .sm\:text-5xl{font-size:3rem;line-height:1;}
            }
            @media (min-width:1024px){
                .lg\:px-8{padding-left:2rem;padding-right:2rem;}
            }
            </style>
    </head>
    <body class="antialiased">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!--
      This example requires updating your template:

      ```
      <html class="h-full">
      <body class="h-full">
      ```
    -->
    <div class="h-screen pt-16 pb-12 flex flex-col bg-white">
        <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex-shrink-0 flex justify-center">
                <a href="/" class="inline-flex">
                    <span class="sr-only">{{ config("app.name") }}</span>
                    <x-logo width="140" class="fill-current" middle="text-indigo-600"/>
                </a>
            </div>
            <div class="py-16">
                <div class="text-center">
                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide">@yield('code')</p>
                    <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">@yield('message')</h1>
                    <p class="mt-2 text-base text-gray-500 max-w-2xl mx-auto">@yield('message2')</p>
                    <div class="mt-6">
                        <a href="{{ url("/") }}" class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back home<span aria-hidden="true"> &rarr;</span></a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="flex-shrink-0 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex justify-center space-x-6 flex-row">
                <a href="https://github.com/vlados" target="_blank" rel="nofollow" data-tooltip="GitHub">
                    <x-fab-github class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>
                </a>
                <a href="https://angel.co/vlados" target="_blank" rel="nofollow" data-tooltip="AngelList">
                    <x-fab-angellist class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>
                </a>
                <a href="https://twitter.com/vlados" target="_blank" rel="nofollow" data-tooltip="Twitter">
                    <x-fab-twitter class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>
                </a>
                <a href="https://www.linkedin.com/in/vstoitsov/" target="_blank" rel="nofollow" data-tooltip="LinkedIn">
                    <x-fab-linkedin class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>
                </a>
                <a href="https://www.youtube.com/user/vlados01/" target="_blank" rel="nofollow"
                   data-tooltip="My YouTube channel">
                    <x-fab-youtube class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>
                </a>
                <a href="https://www.facebook.com/vlados" target="_blank" rel="nofollow" data-tooltip="Facebook">
                    <x-fab-facebook class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>
                </a>

            </div>

        </footer>
    </div>

{{--    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">--}}
{{--            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">--}}
{{--                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">--}}
{{--                    <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">--}}
{{--                        @yield('code')--}}
{{--                    </div>--}}

{{--                    <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">--}}
{{--                        @yield('message')--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </body>
</html>
