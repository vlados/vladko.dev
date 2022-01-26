@extends('layouts.app')

@section('content')

	<div class="relative overflow-hidden" id="top">
		<span class="anchor" id="top"></span>
		<div class="relative pt-6 mt-2">
			@include('layouts.header')
			<main class="container mx-auto">
				<div
					class="relative px-5 py-10 mt-10 overflow-hidden bg-gray-100 border border-gray-300 border-dashed rounded-2xl print:rounded-none print:py-0 print:bg-white print:border-0 lg:py-28 print:p-0">
					<div class="relative z-20 max-w-4xl mx-auto text-center print:w-full print:text-left">
						<p class="text-sm sub-title print:text-left print:hidden" x-data="typewriter($el)">
							Full-stack web developer
						</p>
						<p class="text-sm sub-title print:text-left hidden print:block">
							Full-stack web developer
						</p>

						<h1 class="box-border px-0 pt-0 pb-6 m-0 text-4xl font-bold tracking-tight text-center text-gray-900 align-baseline border-0 xl:text-5xl xl:tracking-normal md:text-4xl md:pb-8 md:tracking-tight">
							<span class="block print:hidden">I am Vladislav Stoitsov</span>
							<span class="hidden print:block print:text-left print:relative">Vladislav Stoitsov</span>
						</h1>

						<p class="box-border p-0 m-0 text-lg text-center align-baseline border-0 print:text-left">
							Full-stack web developer with more than 16 years of experience leading both front-end and
							back-end development. Let teams of 5-15 people across technology, business and design
							departments.
						</p>
						<a href="#contact"
						   class="box-border inline-flex items-center content-center px-6 py-2 m-0 overflow-visible font-semibold text-center text-white normal-case bg-indigo-700 border border-indigo-700 border-solid rounded-full cursor-pointer mt-7 focus:bg-blue-900 focus:border-blue-900 focus:shadow-none focus:text-white hover:bg-blue-900 hover:border-blue-900 hover:text-white print:hidden">
							Let's talk
						</a>

						<div class="flex flex-row justify-center mt-8 space-x-6 print:hidden">
							<a href="https://github.com/vlados" target="_blank" rel="nofollow" data-tooltip="GitHub">
								@bot
								GitHub
								@else
									<svg class="w-6 h-6 text-gray-500 fill-current hover:text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg"
										 viewBox="0 0 496 512">
										<path
											d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/>
									</svg>
									@endbot
							</a>
							<a href="https://angel.co/vlados" target="_blank" rel="nofollow" data-tooltip="AngelList">
								@bot
								AngelList
								@else
									<svg class="w-6 h-6 text-gray-500 fill-current hover:text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg"
										 viewBox="0 0 448 512">
										<path
											d="M347.1 215.4c11.7-32.6 45.4-126.9 45.4-157.1 0-26.6-15.7-48.9-43.7-48.9-44.6 0-84.6 131.7-97.1 163.1C242 144 196.6 0 156.6 0c-31.1 0-45.7 22.9-45.7 51.7 0 35.3 34.2 126.8 46.6 162-6.3-2.3-13.1-4.3-20-4.3-23.4 0-48.3 29.1-48.3 52.6 0 8.9 4.9 21.4 8 29.7-36.9 10-51.1 34.6-51.1 71.7C46 435.6 114.4 512 210.6 512c118 0 191.4-88.6 191.4-202.9 0-43.1-6.9-82-54.9-93.7zM311.7 108c4-12.3 21.1-64.3 37.1-64.3 8.6 0 10.9 8.9 10.9 16 0 19.1-38.6 124.6-47.1 148l-34-6 33.1-93.7zM142.3 48.3c0-11.9 14.5-45.7 46.3 47.1l34.6 100.3c-15.6-1.3-27.7-3-35.4 1.4-10.9-28.8-45.5-119.7-45.5-148.8zM140 244c29.3 0 67.1 94.6 67.1 107.4 0 5.1-4.9 11.4-10.6 11.4-20.9 0-76.9-76.9-76.9-97.7.1-7.7 12.7-21.1 20.4-21.1zm184.3 186.3c-29.1 32-66.3 48.6-109.7 48.6-59.4 0-106.3-32.6-128.9-88.3-17.1-43.4 3.8-68.3 20.6-68.3 11.4 0 54.3 60.3 54.3 73.1 0 4.9-7.7 8.3-11.7 8.3-16.1 0-22.4-15.5-51.1-51.4-29.7 29.7 20.5 86.9 58.3 86.9 26.1 0 43.1-24.2 38-42 3.7 0 8.3.3 11.7-.6 1.1 27.1 9.1 59.4 41.7 61.7 0-.9 2-7.1 2-7.4 0-17.4-10.6-32.6-10.6-50.3 0-28.3 21.7-55.7 43.7-71.7 8-6 17.7-9.7 27.1-13.1 9.7-3.7 20-8 27.4-15.4-1.1-11.2-5.7-21.1-16.9-21.1-27.7 0-120.6 4-120.6-39.7 0-6.7.1-13.1 17.4-13.1 32.3 0 114.3 8 138.3 29.1 18.1 16.1 24.3 113.2-31 174.7zm-98.6-126c9.7 3.1 19.7 4 29.7 6-7.4 5.4-14 12-20.3 19.1-2.8-8.5-6.2-16.8-9.4-25.1z"/>
									</svg>
									@endbot
							</a>
							<a href="https://twitter.com/vlados" target="_blank" rel="nofollow" data-tooltip="Twitter">
								@bot
								Twitter
								@else
									<svg class="w-6 h-6 text-gray-500 fill-current hover:text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg"
										 viewBox="0 0 512 512">
										<path
											d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
									</svg>
									@endbot
							</a>
							<a href="https://www.linkedin.com/in/vstoitsov/" target="_blank" rel="nofollow"
							   data-tooltip="LinkedIn">
								@bot
								LinkedIn
								@else
									<svg class="w-6 h-6 text-gray-500 fill-current hover:text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg"
										 viewBox="0 0 448 512">
										<path
											d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/>
									</svg>
									@endbot
							</a>
							<a href="https://www.youtube.com/user/vlados01/" target="_blank" rel="nofollow"
							   data-tooltip="My YouTube channel">
								@bot
								YouTube
								@else
									<svg class="w-6 h-6 text-gray-500 fill-current hover:text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg"
										 viewBox="0 0 576 512">
										<path
											d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/>
									</svg>
									@endbot
							</a>
							<a href="https://www.facebook.com/vlados" target="_blank" rel="nofollow"
							   data-tooltip="Facebook">
								@bot
								Facebook
								@else
									<svg class="w-6 h-6 text-gray-500 fill-current hover:text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg"
										 viewBox="0 0 512 512">
										<path
											d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/>
									</svg>
									@endbot
							</a>


						</div>

					</div>
				</div>
			</main>
			<div class="print:hidden">
				<div class="container py-12 mx-auto lg:py-16">
					<p class="text-base font-semibold tracking-wider text-center text-gray-600 uppercase">
						Trusted by over 50 small, medium companies and large enterprises
					</p>
					<div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:mt-8 gap-0.5">
						<div class="flex justify-center px-8 py-8">
							<x-image class="max-h-12" src="abb.png" width="121" height="48" alt="ABB"/>
						</div>
						<div class="flex justify-center px-8 py-8">
							<x-image class="max-h-12" src="hitachi.png" width="255" height="44" alt="Hitachi"/>
						</div>
						<div class="flex justify-center px-8 py-8">
							<x-image class="max-h-12" src="tsh.png" width="105" height="48" alt="The Software House"/>
						</div>
						<div class="flex justify-center px-8 py-8">
							<x-image class="max-h-12" src="nelas.png" width="210" height="48" alt="Nelas"/>
						</div>
						<div class="flex justify-center px-8 py-8">
							<x-image class="max-h-12" src="galardo.png" width="198" height="48" alt="Galardo"/>
						</div>
						<div class="flex justify-center px-8 py-8">
							<x-image class="max-h-12" src="jcd.png" width="122" height="48" alt="JCDecaux"/>
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
	@unlessbot
	<livewire:contact/>
	@endbot
@endsection
