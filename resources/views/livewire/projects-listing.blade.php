<div class="container mx-auto">
	@if (count($filtered_projects))
		<span class="anchor" id="projects"></span>
		<div class="md:flex md:items-center md:justify-between">
			<h2 class="text-3xl font-extrabold text-gray-900 md:mx-auto">
				Projects on focus
			</h2>
		</div>
		@unlessbot
		<livewire:project-details/>
		<div class="md:hidden">
			<x-select
				label="Filter by technology"
				placeholder="All technologies"
				:options="$tags"
				wire:model="selected_tag"
			/>
		</div>

		<div class="group p-1 rounded-lg md:flex hidden bg-gray-100 hover:bg-gray-200 max-w-fit mx-auto mt-5 relative">
			@foreach($tags as $tag)
				<button type="button" wire:key="tag_{{ ($tag) }}"
						class="flex focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-md focus:outline-none focus-visible:ring-offset-gray-100">
                    <span wire:click.prefetch="$set('selected_tag', '{{ $tag }}')"
						  class="p-1.5 lg:px-5 rounded-md flex items-center text-sm font-medium {{ $selected_tag==$tag?'bg-white shadow':'' }}">
                        {{ $tag }}
                    </span>
				</button>
			@endforeach

			{{--			<div class="absolute -translate-y-7 left-1/2 translate-x-1/2 top-0 pointer-events-auto opacity-0 group-hover:opacity-70 cursor-default transition-all">--}}
			{{--				<svg class="-rotate-[24deg] w-2/3 stroke-indigo-200 group-hover:stroke-indigo-300" id="e84db801-730c-48af-b546-c9f0c726e8a7" data-name="Layer 3"--}}
			{{--					 xmlns="http://www.w3.org/2000/svg" width="117.3" height="32.1" viewBox="0 0 117.3 32.1">--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M327.2,238.9a120.6,120.6,0,0,1,89.3,26.4c1,.9,2.5-.6,1.5-1.4a118.3,118.3,0,0,0-90.9-25.4.2.2,0,0,0,.1.4Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M328.6,246.7c15.1.1,29.6.3,44.5,3.5A170,170,0,0,1,415.2,265c.7.4,1.3-.7.6-1.1-26-13.1-57.9-21.4-87.2-17.7-.4,0-.4.5,0,.5Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M326.2,234.2c.2,1.3.5,2.7.8,4s.8.3.7-.2-.5-2.7-.9-4-.7-.2-.6.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M328.3,246.4a20.4,20.4,0,0,0,1.6,6.8.3.3,0,1,0,.5-.1c-.5-2.2-.9-4.7-1.6-6.8-.1-.3-.6-.2-.5.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M302.4,250.7a131.6,131.6,0,0,1,27.2,3.5c.6.1.9-.9.2-1a101.1,101.1,0,0,0-27.4-3.1.3.3,0,0,0,0,.6Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M301.6,250.6c7.9-6.2,15.6-12.1,25-16,.6-.2.3-1.4-.3-1.1a83,83,0,0,0-25.2,16.6c-.3.3.1.7.5.5Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M303.4,248.5a2.4,2.4,0,0,0,.7,1.6c.3.5,1-.2.6-.6a1.4,1.4,0,0,1-.5-1,.4.4,0,0,0-.8,0Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M304.4,247.2a15.8,15.8,0,0,0,.9,3.1c.3.5.9.2.9-.3a15.7,15.7,0,0,0-1.2-3c-.1-.4-.8-.3-.6.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M305.9,246.6c.4,1.2.7,2.5,1.1,3.7s1.3.4,1.1-.3-1-2.4-1.4-3.6-.9-.2-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M307.2,245.9a13.3,13.3,0,0,1,1.4,4.8c0,.7,1.1.6,1-.2a13.3,13.3,0,0,0-1.9-5c-.2-.3-.7,0-.5.4Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M308.9,244.7a23.9,23.9,0,0,1,1.3,5.1.6.6,0,1,0,1.1-.1,32.4,32.4,0,0,0-1.6-5.3c-.2-.4-1-.1-.8.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M310.5,243.9a33.7,33.7,0,0,0,2.2,6.8c.2.6,1.2.2,1-.4-.8-2.2-1.6-4.4-2.3-6.6a.5.5,0,1,0-.9.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M312.2,242.8c.8,2.6,1.4,5.2,2.4,7.7a.6.6,0,0,0,1.1-.3c-.7-2.6-1.7-5.1-2.5-7.7-.2-.6-1.2-.3-1,.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M314.4,241.1l2.6,9.2c.3.7,1.4.4,1.2-.3-.9-3.1-1.9-6.1-2.8-9.1a.5.5,0,0,0-1,.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M316.6,239.8c1.1,4.1,2.2,8.3,3.4,12.4.3.8,1.5.5,1.3-.3-1.1-4.2-2.4-8.3-3.7-12.4a.5.5,0,0,0-1,.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M318.8,238.4c1,3.9,2.1,7.7,3.2,11.6.2.8,1.5.5,1.2-.3-1.1-3.9-2.2-7.8-3.5-11.6a.5.5,0,0,0-.9.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M321.1,236.6c.6,5.2,2.2,10.4,3.5,15.4.2.8,1.6.5,1.4-.4-1.2-5-2.3-10.3-4.2-15.1-.2-.3-.8-.3-.7.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M323.3,236.2c1.3,5.2,2.4,10.5,3.5,15.8.1.8,1.4.4,1.2-.4a144,144,0,0,0-3.9-15.7c-.2-.5-.9-.3-.8.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M325.1,234.2c1.1,5.6,2.5,11.2,3.5,16.9.1.8,1.4.5,1.2-.3a136,136,0,0,0-4.2-16.7c-.1-.3-.6-.2-.5.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M328.2,238.9c.4,2.1.9,4.2,1.4,6.4.1.5,1,.3.8-.3s-1.1-4.2-1.8-6.2c-.1-.3-.4-.2-.4.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M330.2,238.9c.5,1.9,1,3.8,1.3,5.7s1,.6.9-.1a27.7,27.7,0,0,0-1.7-5.8c-.1-.3-.5-.1-.5.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M331.7,238.3a56.5,56.5,0,0,0,1.7,7.1c.2.6,1.3.3,1-.3a42.2,42.2,0,0,1-2.1-6.9c-.1-.4-.6-.2-.6.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M333.5,238.6c.5,2.3.9,4.5,1.4,6.7a.6.6,0,0,0,1.1-.3l-1.8-6.6c-.1-.4-.8-.2-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M335.4,239.5a21.3,21.3,0,0,1,1,5.7c0,.6,1.1.6,1,0a28.1,28.1,0,0,0-1.2-5.9c-.2-.5-1-.3-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M336.8,238.6a62.3,62.3,0,0,1,1.5,6.2c.1.7,1.3.5,1.2-.2a17.8,17.8,0,0,0-2-6.3c-.2-.3-.8-.1-.7.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M339,238.2a19,19,0,0,1,1.6,6.1c.1.8,1.4.8,1.3,0a21.9,21.9,0,0,0-2-6.6c-.3-.6-1.1-.1-.9.5Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M341.3,238a28.5,28.5,0,0,1,1.4,6.3c.1.7,1.1.7,1,0a21.8,21.8,0,0,0-1.8-6.5c-.1-.3-.7-.1-.6.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M343.1,237.8l1.5,7c.1.7,1.3.4,1.1-.3-.6-2.3-1.2-4.6-1.9-6.9-.1-.4-.8-.2-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M344.8,238.1a54.4,54.4,0,0,0,1.7,7.8.6.6,0,0,0,1.1-.3c-.8-2.6-1.5-5.1-2.1-7.7-.1-.5-.8-.3-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M346.7,238.7a28.1,28.1,0,0,1,1.6,6.5.6.6,0,1,0,1.2-.2,32.2,32.2,0,0,0-2-6.7c-.2-.4-1-.1-.8.4Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M349,239.1a41.8,41.8,0,0,1,1.6,6.8c.1.6,1.1.4,1.1-.2a25.9,25.9,0,0,0-2-6.7c-.1-.5-.8-.3-.7.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M350.7,238.8a22.7,22.7,0,0,0,1.6,7.3.6.6,0,1,0,1.2-.3c-.6-2.4-1.4-4.7-1.9-7.1-.1-.5-1-.4-.9.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M352.7,238.6c.5,2.3,1,4.6,1.6,7,.2.6,1.2.3,1-.3-.7-2.3-1.3-4.6-2.1-6.9a.3.3,0,1,0-.5.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M354.6,238.9c.4,2.7,1.2,5.2,1.8,7.8.2.8,1.4.4,1.2-.3-.7-2.6-1.4-5.2-2.3-7.7-.1-.4-.8-.2-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M356.8,239.2c.4,2.6.8,5.2,1.3,7.8.1.7,1.3.4,1.2-.4-.5-2.5-1.1-5.1-1.7-7.6-.1-.5-.9-.3-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M358.3,240.3c.7,2.4,1.1,4.8,1.6,7.2.2.7,1.4.6,1.3-.1A19.2,19.2,0,0,0,359,240c-.2-.4-.8-.1-.7.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M360.3,240.3a51.6,51.6,0,0,0,2,6.7c.3.9,1.8.5,1.4-.4A38.1,38.1,0,0,0,361,240c-.2-.5-.8-.2-.7.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M362.9,240a68.5,68.5,0,0,1,1.6,7.6c.2.9,1.7.5,1.5-.5a31.5,31.5,0,0,0-2.2-7.4.5.5,0,0,0-.9.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M365.7,241.1a26.7,26.7,0,0,1,1.5,6.8c.1.7,1.1.7,1.1,0a28.8,28.8,0,0,0-1.8-7c-.2-.5-1-.3-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M367.5,241.4l1.8,7c.2.8,1.5.4,1.3-.4s-1.5-4.5-2.2-6.8a.5.5,0,0,0-.9.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M369.7,241.7c.8,2.5,1.4,5,2.3,7.5.3.8,1.6.5,1.3-.3-.8-2.5-1.8-5-2.7-7.4-.2-.6-1.1-.4-.9.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M372.2,242.8c.5,2.2,1.1,4.5,1.8,6.7s1.6.5,1.3-.4-1.3-4.4-2.1-6.6a.5.5,0,0,0-1,.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M374.6,243a41.5,41.5,0,0,0,1.5,7c.3.9,1.6.5,1.3-.3a39.4,39.4,0,0,1-2.1-6.9c-.1-.5-.8-.2-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M376.3,242.8a32.2,32.2,0,0,1,1.7,7.6c.1.6,1,.6.9,0a29.8,29.8,0,0,0-2-7.8.3.3,0,1,0-.6.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M378.7,244.4c.5,2.1,1.1,4.2,1.7,6.2s1.5.4,1.2-.3a62.6,62.6,0,0,1-2.1-6.1c-.1-.5-.9-.3-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M380.9,245c.5,2.2,1.1,4.4,1.7,6.6s1.5.5,1.3-.3-1.5-4.4-2.2-6.6c-.1-.5-1-.3-.8.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M383.1,246.3c.6,1.9,1.1,3.8,1.6,5.7s1.6.4,1.3-.4a53.7,53.7,0,0,0-2.1-5.6c-.2-.5-1-.1-.8.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M385.1,246.6c.5,1.8,1.2,3.5,1.6,5.3s1.6.4,1.2-.5a43.4,43.4,0,0,1-2-5c-.2-.5-1-.3-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M387.9,248.8c.4,1.7.9,3.3,1.3,5s.8.2.7-.2-1.1-3.3-1.6-4.9-.5-.2-.4.1Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M388.8,248l2.1,6.4c.3.6,1.3.4,1-.3s-1.5-4.2-2.3-6.3c-.2-.4-.9-.2-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M390.6,248.8l2.1,5.8c.2.7,1.2.3.9-.4s-1.6-3.7-2.3-5.6c-.2-.4-.9-.2-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M392.5,249.4a52.2,52.2,0,0,0,1.8,5.6c.3.7,1.4.3,1.1-.4a40.8,40.8,0,0,1-2.2-5.4c-.1-.5-.8-.3-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M394.1,249.9l2.1,5.3a.5.5,0,1,0,.9-.4c-.8-1.7-1.5-3.4-2.3-5.2s-.9-.1-.7.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M396.3,250.5c.6,1.8,1.3,3.5,2,5.3a.6.6,0,1,0,1-.5c-.7-1.7-1.5-3.4-2.3-5.1s-.9-.1-.7.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M398.8,251.9c.4,1.6.9,3.1,1.4,4.7s1.4.4,1.1-.3-1.2-3.2-1.9-4.7-.7-.1-.6.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M401.2,253.8c.3,1.3.6,2.6,1,3.9s1.3.4,1.1-.3-.9-2.5-1.3-3.8a.4.4,0,0,0-.8.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M402.9,254.9a16.4,16.4,0,0,0,1.3,4.3c.3.7,1.4.1,1-.6a16.8,16.8,0,0,1-1.6-3.9c-.1-.5-.8-.3-.7.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M405.1,256.5a11.9,11.9,0,0,0,1.7,3.8c.4.4,1.3,0,1.1-.6a9.5,9.5,0,0,0-1-1.7,15.1,15.1,0,0,1-.9-1.8c-.3-.5-1.1-.2-.9.3Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M408.3,258.5a13.3,13.3,0,0,0,1.3,3.5c.4.7,1.5.1,1.1-.6l-.9-1.5-.6-1.6c-.1-.6-1-.4-.9.2Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--					<path class="e9fb9360-be8e-410f-9ad1-23e5bb5444cd"--}}
			{{--						  d="M410,259.8a15.2,15.2,0,0,1,1.2,3.2c.1.9,1.7.5,1.4-.4a13.5,13.5,0,0,0-1.7-3.4.5.5,0,1,0-.9.6Z"--}}
			{{--						  transform="translate(-301 -233.5)"/>--}}
			{{--				</svg>--}}
			{{--				<span class="absolute top-0 text-[10px] leading-3 font-semibold -rotate-[7deg] translate-x-5 -translate-y-2/3 text-indigo-600">this is livewire</span>--}}
			{{--			</div>--}}
		</div>
		@endbot
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mt-6 my-10">
			@foreach($filtered_projects as $project)
				<a class="group flex flex-col" href="#" @click.prevent="loadProject({{ $project->id}})"
				   wire:key="project_{{ $project->id }}">
                        <span
							class="border border-gray-200 group-hover:border-indigo-500 group-hover:ring-4 group-hover:ring-indigo-100 rounded transition-all group-hover:shadow-lg inline-flex relative">
                            @if ($project->hasMedia('images'))
								<img src="{{ $project->getFirstMediaUrl("images","thumb") }}"
									 loading="lazy"
									 alt="{{ $project->project_name }}"
									 class="object-cover rounded w-full h-auto">
							@endif
							@if ($project->latest)
								<span
									class="absolute right-1.5 top-1.5 items-center px-1.5 py-0.5 rounded text-xs font-semibold bg-red-200 uppercase text-red-800">latest</span>

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
