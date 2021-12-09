<div class=" py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24 section print:hidden">
    <span class="anchor" id="contact"></span>

    <div class="relative max-w-xl mx-auto">

        <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none"
             viewBox="0 0 404 404" aria-hidden="true">
            <defs>
                <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                         patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                </pattern>
            </defs>
            <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"/>
        </svg>
        <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none"
             viewBox="0 0 404 404" aria-hidden="true">
            <defs>
                <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                         patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                </pattern>
            </defs>
            <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"/>
        </svg>
        <div class="text-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Contact
            </h2>
            <p class="mt-4 text-lg leading-6 text-gray-500">
                Are you looking for a top-shelf full-stack web developer? Feel free to contact me if you have any questions, are interested in working together or just want to have a chat.
            </p>
        </div>
        <div class="mt-12">
            <form wire:submit.prevent="submit" class="gap-6 space-y-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <x-input label="First Name" placeholder="First Name" wire:model.defer="first_name" />
                    <x-input label="Last Name" placeholder="Last Name" wire:model.defer="last_name"/>
                </div>

                <x-input label="Company" placeholder="Company" wire:model.defer="company"/>
                <x-input label="E-mail" placeholder="E-mail" wire:model.defer="mail"/>
                <x-textarea label="Message" placeholder="Message" wire:model.defer="message"/>

                <div class="sm:col-span-2">
                    <x-button type="submit" primary spinner="submit" size="lg"
                            class="w-full inline-flex items-center justify-center p-6 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Let's talk
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
