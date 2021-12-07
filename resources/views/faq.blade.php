<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
    <a class="anchor" id="faq"></a>

    <div class="lg:grid lg:grid-cols-3 lg:gap-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900">
                Frequently asked questions
            </h2>
            <p class="mt-4 text-lg text-gray-500">Can’t find the answer you’re looking for? Drop me a line from the <a href="#contact" class="font-medium text-indigo-600 hover:text-indigo-500">contact form</a></p>
        </div>
        <div class="mt-12 lg:mt-0 lg:col-span-2">
            <dl class="space-y-12">

                @foreach($faq as $f)
                <div>
                    <dt class="text-lg leading-6 font-medium text-gray-900">
                        {!! $f["question"] !!}
                    </dt>
                    <dd class="mt-2 text-base text-gray-500">
                        {!! $f["answer"] !!}
                    </dd>
                </div>
                @endforeach

            </dl>
        </div>
    </div>
</div>
