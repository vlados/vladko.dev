@extends('layouts.app')

@section('content')
    <livewire:project-details/>
    <div class="grid md:grid-cols-4 gap-10 m-10">
        @foreach(\App\Models\Project::all() as $project)
            <a class="group flex flex-col" href="#" @click="loadProject({{ $project->id}})">
                        <span
                            class="w-full relative bg-gray-200 rounded-xl overflow-hidden aspect-w-1 aspect-h-1 group-hover:shadow-xl transition">
                            @if ($project->hasMedia('images'))
                                <img src="{{ $project->getFirstMediaUrl("images") }}"
                                     alt="Natural leather journal with brass disc binding and three paper refill sets."
                                     class="w-full h-full object-center object-cover group-hover:opacity-75">
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

@endsection
