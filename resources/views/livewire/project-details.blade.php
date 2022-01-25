<div class="fixed inset-0 z-50" x-data="projectDetails" x-cloak x-show="visible"
     @project-modal.window="visible = $event.detail.visibility">
    <div class="absolute inset-0 bg-gray-900/80 backdrop-blur -z-10" @click="hide()"></div>
    @if ($loading)
        <div class="flex w-full items-center justify-center h-full">
            <div class=" w-14 h-14 animate-spin text-white">
                <svg viewBox="0 0 1024 1024" focusable="false" data-icon="loading" width="100%"
                     height="100%"
                     fill="currentColor" aria-hidden="true">
                    <path
                        d="M988 548c-19.9 0-36-16.1-36-36 0-59.4-11.6-117-34.6-171.3a440.45 440.45 0 00-94.3-139.9 437.71 437.71 0 00-139.9-94.3C629 83.6 571.4 72 512 72c-19.9 0-36-16.1-36-36s16.1-36 36-36c69.1 0 136.2 13.5 199.3 40.3C772.3 66 827 103 874 150c47 47 83.9 101.8 109.7 162.7 26.7 63.1 40.2 130.2 40.2 199.3.1 19.9-16 36-35.9 36z"></path>
                </svg>
            </div>
        </div>
    @else
        <div class="container mx-auto flex h-full flex-col px-0">
            <div class="bg-white min-w-full h-full p-5 overflow-y-auto py-10 relative" x-init="$el.scrollTop = 0"
                 @scroll="scrollShadow = (($el.scrollHeight - $el.scrollTop) == $el.offsetHeight)?false:true">
                <picture>
                    <source srcset="{{ asset("images/background/bg-top.webp") }}" type="image/webp">
                    <img src="{{ asset("images/background/bg-top.png") }}/" alt=""
                         class="top-0 md:top-5 absolute lef-0 right-0 w-full" width="1910" height="1321">
                </picture>
                <div class="bg-white relative max-w-4xl mx-auto">
                    <h1 class="text-2xl tracking-tight font-extrabold text-gray-900 sm:text-3xl md:text-4xl text-center">
                        {{ $project->project_name }}
                    </h1>
                    @if ($project->technologies)
                        <div class="text-center gap-x-4 md:max-w-3xl mx-auto flex justify-center my-4 pb-4">
                            @foreach(explode(",",$project->technologies) as $tag)
                                <span
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif


                    @if ($project->description)
                        <div
                            class="mt-1 my-3 max-w-md mx-auto prose prose-base prose-ul:list-none leading-6 text-gray-500 md:max-w-5xl text-center">
                            {!! $project->description !!}
                        </div>
                    @endif


                </div>
                @if ($project->hasMedia('images'))
                    <div
                        class="relative z-20 px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 bg-white mt-10">
                        @foreach($project->getMedia('images') as $img)
                            <a href="{{ $img->getFullUrl('large') }}" data-fancybox="project_{{ $project->id }}"
                               data-caption="{!! $img->getCustomProperty("caption") !!}"
                               class="border border-gray-200 hover:border-indigo-500 hover:ring-4 hover:ring-indigo-100 rounded transition-all hover:shadow-lg overflow-hidden">
                                <figure class="relative">
                                    <img src="{{ $img->getFullUrl('thumb') }}" class="w-auto object-cover rounded"/>
                                    <figcaption class="absolute text-xs text-gray-600 bottom-0 bg-white/80 backdrop-blur backdrop-filter backdrop-grayscale w-full py-1 px-3 truncate">{{ $img->getCustomProperty("caption") }}</figcaption>
                                </figure>
                            </a>

                        @endforeach
                    </div>
                @endif
            </div>
            {{--            <div class="relative w-full h-0" x-show="scrollShadow" x-transition>--}}
            {{--                <div class="bg-gradient-to-b from-white/0 to-gray-300/20 h-10 absolute left-0 right-0 -top-10"></div>--}}
            {{--            </div>--}}
            <div class="bg-gray-50 border-t-2 border-gray-200 py-3 grid grid-cols-1 md:grid-cols-3">
                <div></div>
                <livewire:reactions :project="$project"/>
                <div class="font-bold text-base flex justify-center items-center text-gray-500 pr-0 md:pr-10 md:justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    {{ $visits }} views
                </div>

            </div>
        </div>
        <div class="absolute right-4 top-4 z-50 cursor-pointer" @click="hide();">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 md:text-white" fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
    @endif

</div>
