<header x-data="{ open: false }" @keydown.window.escape="open = false" class="fixed top-0 z-40 items-center w-full py-3 transition-all print:hidden bg-gray-50 backdrop-blur-md bg-opacity-70 backdrop-grayscale backdrop-filter"
        :class="{'shadow-md': visibleScrollToTop }"
>
    <div class="container px-8 mx-auto">
        <nav class="relative flex items-center justify-between sm:h-10 md:justify-center"
             aria-label="Global">
            <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="#">
                        <span class="sr-only">{{ config("app.name") }}</span>
                        <x-logo height="40" width="40" class="ml-2 fill-current"/>
                    </a>
                    <div class="flex items-center -mr-2 md:hidden">
                        <button type="button" @click="open = true"
                                class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md bg-gray-50 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!-- Heroicon name: outline/menu -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex md:space-x-10">

                <a href="#about"
                   class="text-lg font-medium leading-6 text-left text-gray-900 no-underline hover:text-indigo-700">About
                    me</a>
                <a href="#skills"
                   class="text-lg font-medium leading-6 text-left text-gray-900 no-underline hover:text-indigo-700">Skills</a>
                <a href="#experience"
                   class="text-lg font-medium leading-6 text-left text-gray-900 no-underline hover:text-indigo-700">Experience</a>
                @if (count($projects))
                    <a href="#projects"
                       class="text-lg font-medium leading-6 text-left text-gray-900 no-underline hover:text-indigo-700">Latest
                        projects</a>
                @endif
                <a href="#contact"
                   class="text-lg font-medium leading-6 text-left text-gray-900 no-underline hover:text-indigo-700">Contact</a>
            </div>
        </nav>
    </div>

    <div x-show="open" class="fixed inset-0 z-40 flex min-h-screen md:hidden"
         x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
         aria-modal="true">

        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="fixed inset-0 min-h-screen bg-gray-600 bg-opacity-75"
             x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." @click="open = false"
             aria-hidden="true">
        </div>

        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             x-description="Off-canvas menu, show/hide based on off-canvas menu state."
             class="relative flex flex-col flex-1 w-full max-w-xs bg-gray-800">

            <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 x-description="Close button, show/hide based on off-canvas menu state."
                 class="absolute top-0 right-0 pt-2 -mr-12">
                <button type="button"
                        class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        @click="open = false">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6 text-white" x-description="Heroicon name: outline/x"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <nav class="flex flex-col items-center justify-center h-full px-3 space-y-1 text-center align-middle"
                 @click="open=false">
                <a href="#about"
                   class="w-full px-2 py-2 text-xl font-medium text-center text-indigo-100 rounded-md group">About
                    me</a>
                <a href="#skills"
                   class="w-full px-2 py-2 text-xl font-medium text-center text-indigo-100 rounded-md group">Skills</a>
                <a href="#experience"
                   class="w-full px-2 py-2 text-xl font-medium text-center text-indigo-100 rounded-md group">Experience</a>
                @if (count($projects))
                    <a href="#projects"
                       class="w-full px-2 py-2 text-xl font-medium text-center text-indigo-100 rounded-md group">Latest
                        projects</a>
                @endif
                <a href="#contact"
                   class="w-full px-2 py-2 text-xl font-medium text-center text-indigo-100 rounded-md group">Contact</a>

            </nav>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</header>
