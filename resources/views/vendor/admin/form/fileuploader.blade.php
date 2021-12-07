<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">
	<h4 class="text-center">{{$label}}</h4>
	<div class="">
		@include('admin::form.error')
		<input accept="{{ implode(",", array_map(function ($ext) {return !strpos($ext,"/")?".". $ext:$ext;}, $extensions)) }}"
			   id="{{$id}}" type="file" class="{{$class}}" name="{{$name}}[]" {!! $attributes !!} />
		@include('admin::form.help-block')
	</div>
</div>

<script>
	$(document).ready(function () {
		initUploader('#{{ $id }}', {
			files: {!! json_encode($value) !!},
			extensions: {!! json_encode($extensions) !!},
			url: '{!! $url !!}',
			csrf_token: '{{ $csrf_token }}',
			column: "{{ $column }}",
			minWidth: {{ $minWidth ? $minWidth: "false" }},
			minHeight: {!! $minHeight ? $minHeight: "false" !!},
		});
	})

</script>
