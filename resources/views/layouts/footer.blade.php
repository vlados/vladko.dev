<!-- This example requires Tailwind CSS v2.0+ -->
<footer class="print:hidden">
    <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
        <nav class="-mx-5 -my-2 flex flex-wrap justify-center space-x-7" aria-label="Footer">
            <a href="#about"
               class="text-gray-900 no-underline hover:text-indigo-700">About
                me</a>
            <a href="#skills"
               class="text-gray-900 no-underline hover:text-indigo-700">Skills</a>
            <a href="#experience"
               class="text-gray-900 no-underline hover:text-indigo-700">Experience</a>
            @if (count($projects))
                <a href="#projects"
                   class="text-gray-900 no-underline hover:text-indigo-700">Latest
                    projects</a>
            @endif
            <a href="#contact"
               class="text-gray-900 no-underline hover:text-indigo-700">Contact</a>
        </nav>
{{--        <div class="mt-8 flex justify-center space-x-6 flex-row">--}}
{{--            <a href="https://github.com/vlados" target="_blank" rel="nofollow" data-tooltip="GitHub">--}}
{{--                <x-fab-github class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--            </a>--}}
{{--            <a href="https://angel.co/vlados" target="_blank" rel="nofollow" data-tooltip="AngelList">--}}
{{--                <x-fab-angellist class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--            </a>--}}
{{--            <a href="https://twitter.com/vlados" target="_blank" rel="nofollow" data-tooltip="Twitter">--}}
{{--                <x-fab-twitter class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--            </a>--}}
{{--            <a href="https://www.linkedin.com/in/vstoitsov/" target="_blank" rel="nofollow" data-tooltip="LinkedIn">--}}
{{--                <x-fab-linkedin class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--            </a>--}}
{{--            <a href="https://www.youtube.com/user/vlados01/" target="_blank" rel="nofollow"--}}
{{--               data-tooltip="My YouTube channel">--}}
{{--                <x-fab-youtube class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--            </a>--}}
{{--            <a href="https://www.facebook.com/vlados" target="_blank" rel="nofollow" data-tooltip="Facebook">--}}
{{--                <x-fab-facebook class="w-6 h-6 text-gray-500 hover:text-indigo-600 fill-current"/>--}}
{{--            </a>--}}

{{--        </div>--}}
        <p class="mt-8 text-center text-base text-gray-400">
            &copy; 2004-{{ date("Y") }} {{ config("app.name") }}. All rights reserved.
        </p>
    </div>
</footer>
