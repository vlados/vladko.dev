@extends('layouts.app')

@section('content')

    <div class="relative  overflow-hidden" id="top">
        <a class="anchor" id="top"></a>
        <div class="relative pt-6">
            @include('layouts.header')
            <main class="container mx-auto ">
                <div class="relative overflow-hidden rounded-2xl print:rounded-none print:py-0 print:bg-white print:border-0 py-10 bg-gray-100 border border-gray-300 border-dashed px-5 lg:py-28 mt-10 print:p-0">
                    <div class="max-w-4xl mx-auto relative text-center z-20 print:w-full print:text-left">
                        <p class="sub-title print:text-left">
                            Full-stack web developer
                        </p>

                        <h1 class="px-0 pt-0 pb-6 m-0 text-4xl font-bold tracking-tight text-center text-gray-900 align-baseline border-0 box-border xl:text-5xl xl:tracking-normal md:text-4xl md:pb-8 md:tracking-tight print:hidden">
                            <span class="md:block">I am Vladislav Stoitsov, a</span>
                            <span class="text-indigo-500 md:block" x-data="typewriter($el)">web developer</span>
                        </h1>
                        <h1 class="px-0 pt-0 pb-6 m-0 text-4xl font-bold tracking-tight text-center text-gray-900 align-baseline border-0 box-border xl:text-5xl xl:tracking-normal md:text-4xl md:pb-8 md:tracking-tight print:block hidden print:text-left print:relative">
                            <span class="md:block">Vladislav Stoitsov</span>
                        </h1>

                        <p class="p-0 m-0 text-lg text-center align-baseline border-0 box-border print:text-left">
                            Full-stack web developer with more than 16 years of experience leading both front-end and
                            back-end development. Let teams of 5-15 people across technology, business and design
                            departments.
                        </p>
                        <a href="#contact"
                           class="mt-7 rounded-full inline-flex overflow-visible content-center items-center py-2 px-6 m-0 font-semibold text-center text-white normal-case bg-indigo-700 border border-indigo-700 border-solid cursor-pointer box-border focus:bg-blue-900 focus:border-blue-900 focus:shadow-none focus:text-white hover:bg-blue-900 hover:border-blue-900 hover:text-white print:hidden">
                            Let's talk
                        </a>

{{--                        <div class="mt-8 flex justify-center space-x-6 flex-row print:hidden">--}}
{{--                            <a href="https://github.com/vlados" target="_blank" rel="nofollow" data-tooltip="GitHub">--}}
{{--                                <x-fab-github class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--                            </a>--}}
{{--                            <a href="https://angel.co/vlados" target="_blank" rel="nofollow" data-tooltip="AngelList">--}}
{{--                                <x-fab-angellist class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--                            </a>--}}
{{--                            <a href="https://twitter.com/vlados" target="_blank" rel="nofollow" data-tooltip="Twitter">--}}
{{--                                <x-fab-twitter class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--                            </a>--}}
{{--                            <a href="https://www.linkedin.com/in/vstoitsov/" target="_blank" rel="nofollow" data-tooltip="LinkedIn">--}}
{{--                                <x-fab-linkedin class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--                            </a>--}}
{{--                            <a href="https://www.youtube.com/user/vlados01/" target="_blank" rel="nofollow"--}}
{{--                               data-tooltip="My YouTube channel">--}}
{{--                                <x-fab-youtube class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--                            </a>--}}
{{--                            <a href="https://www.facebook.com/vlados" target="_blank" rel="nofollow" data-tooltip="Facebook">--}}
{{--                                <x-fab-facebook class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--                            </a>--}}

{{--                        </div>--}}

                    </div>
                </div>
            </main>
            <div class="print:hidden">
                <div class="container mx-auto py-12 lg:py-16">
                    <p class="text-center text-base font-semibold uppercase text-gray-600 tracking-wider">
                        Trusted by over 50 small, medium companies and large enterprises
                    </p>
                    <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:mt-8 gap-0.5">
                        <div class="flex justify-center py-8 px-8">
                            <x-image class="max-h-12" src="abb.png"/>
                        </div>
                        <div class="flex justify-center py-8 px-8">
                            <x-image class="max-h-12" src="hitachi.png"/>
                        </div>
                        <div class="flex justify-center py-8 px-8">
                            <x-image class="max-h-12" src="tsh.png"/>
                        </div>
                        <div class="flex justify-center py-8 px-8">
                            <x-image class="max-h-12" src="nelas.png"/>
                        </div>
                        <div class="flex justify-center py-8 px-8">
                            <x-image class="max-h-12" src="galardo.png"/>
                        </div>
                        <div class="flex justify-center py-8 px-8">
                            <x-image class="max-h-12" src="jcd.png"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include("about")
    @include("skills")
    @include("experience")
    @include("faq")
    @include("projects")
    <livewire:contact/>
@endsection
