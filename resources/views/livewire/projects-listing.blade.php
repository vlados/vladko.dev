<div class="container mx-auto">
    @if (count($filtered_projects))
        <span class="anchor" id="projects"></span>
        <div class="md:flex md:items-center md:justify-between">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Projects on focus
            </h2>
        </div>
        <livewire:project-details/>
        <div class="group p-1 rounded-lg flex bg-gray-100 hover:bg-gray-200 max-w-fit mx-auto mt-5 overflow-hidden">
            @foreach($tags as $tag)
                <button type="button" wire:key="tag_{{ ($tag) }}"
                        class="flex focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-md focus:outline-none focus-visible:ring-offset-gray-100">
                    <span wire:click="$set('selected_tag', '{{ $tag }}')"
                          class="p-1.5 lg:px-5 rounded-md flex items-center text-sm font-medium {{ $selected_tag==$tag?'bg-white shadow':'' }}">
                        {{ $tag }}
                    </span>
                </button>
            @endforeach

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mt-6 my-10">
            @foreach($filtered_projects as $project)
                <a class="group flex flex-col" href="#" @click.prevent="loadProject({{ $project->id}})" wire:key="project_{{ $project->id }}">
                        <span
                            class="border border-gray-200 group-hover:border-indigo-500 group-hover:ring-4 group-hover:ring-indigo-100 rounded transition-all group-hover:shadow-lg inline-flex">
                            @if ($project->hasMedia('images'))
                                <img src="{{ $project->getFirstMediaUrl("images","thumb") }}"
                                     alt="Natural leather journal with brass disc binding and three paper refill sets."
                                     class="object-cover rounded w-full h-auto">
                            @endif
                        </span>
                    <span class="mt-6 block flex-col flex">
                    @if ($project->technologies)
                            <span class="text-center gap-x-2 flex justify-start">
                            @foreach(explode(",",$project->technologies) as $tag)
                                    <span
                                        class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">{{ $tag }}</span>
                                @endforeach
                        </span>
                        @endif
                            <strong class="mt-1 font-semibold text-gray-900">
                                    {{ $project->project_name }}
                            </strong>
                        </span>
                </a>
            @endforeach
        </div>
    @endif
</div>
