<div class="mx-auto flex py-2">
    <div class="gap-x-4 inline-flex flex-row mx-auto">
        <div class="relative z-0 inline-flex shadow-sm rounded-md">
            <button type="button" @click="$wire.set('bravo',!$wire.bravo)"
                    class="-ml-px group relative inline-flex items-center rounded-l-md px-4 py-2 border border-gray-300 from-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md bg-gradient-to-b to-gray-50">
                <x-svg-icon :type="$bravo ? 'solid':'light'" name="hands-clapping"
                            class=" w-3.5 h-3.5 fill-green-500 mr-2"/>
                @if (!$bravo)
                    <x-svg-icon type="light" name="hands-clapping" class="delay-1000 stroke-2 w-3.5 h-3.5 fill-green-300 mr-2 -ml-3.5 -left-2 relative group-hover:animate-ping"/>
                @endif
                <span class="hidden md:inline">Bravo</span>
                <span
                    class="bg-gray-100 font-semibold md:ml-2.5 text-gray-700 text-xs p-0.5 px-1 rounded-md">{{ $bravos }}</span>
            </button>
        </div>
        <div class="relative z-0 inline-flex shadow-sm rounded-md">
            <button type="button" @click="$wire.set('liked',!$wire.liked)" @keydown.l.window="$wire.set('liked',!$wire.liked)"
                    class="-ml-px group relative inline-flex items-center rounded-l-md px-4 py-2 border border-gray-300 from-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md bg-gradient-to-b to-gray-50">
                <x-svg-icon :type="$liked ? 'solid':'light'" name="thumbs-up"
                            class=" w-3.5 h-3.5 fill-indigo-500 mr-2"/>
                @if (!$liked)
                    <x-svg-icon type="light" name="thumbs-up" class="stroke-2 w-3.5 h-3.5 fill-indigo-300 mr-2 -ml-3.5 -left-2 relative group-hover:animate-ping"/>
                @endif

				<span class="hidden md:inline">Like</span>
                <span class="bg-gray-100 font-semibold md:ml-2.5 text-gray-700 text-xs p-0.5 px-1 rounded-md"
                      wire:key="reactionLikes">{{ $likes }}</span>
            </button>
        </div>
        <div class="relative z-0 inline-flex shadow-sm rounded-md">
            <button type="button" @click="$wire.set('loved',!$wire.loved)"
                    class="-ml-px group relative inline-flex items-center rounded-l-md px-4 py-2 border border-gray-300 from-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md bg-gradient-to-b to-gray-50">
                <x-svg-icon :type="$loved ? 'solid':'light'" name="heart" class=" w-3.5 h-3.5 fill-red-500 mr-2"/>
                @if (!$loved)
                    <x-svg-icon type="light" name="heart" class="stroke-2 w-3.5 h-3.5 fill-red-300 mr-2 -ml-3.5 -left-2 relative group-hover:animate-ping"/>
                @endif
				<span class="hidden md:inline">Love</span>
                <span
                    class="bg-gray-100 font-semibold md:ml-2.5 text-gray-700 text-xs p-0.5 px-1 rounded-md">{{ $loves }}</span>
            </button>
        </div>
    </div>
</div>
