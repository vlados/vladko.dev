@props(["image","text"])
<div
    class="flex flex-col space-y-3 items-center  w-24 print:w-20 self-center group transition duration-200 hover:bg-white hover:shadow-xl rounded-lg p-4">
    <img src="{{ asset("images/skills/".$image) }}" class="h-12 print:h-10" alt="{{$text}}" {{ $attributes }}/>
    <span class="leading-3 text-center text-xs text-gray-600 font-semibold">{{ $text }}</span>
</div>
