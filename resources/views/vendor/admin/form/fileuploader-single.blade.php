<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">
	<label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

	<div class="{{$viewClass['field']}}">
        @include('admin::form.error')
        <input id="{{$id}}" type="file" class="{{$class}}" name="{{$name}}[]" {!! $attributes !!} />
        @include('admin::form.help-block')
    </div>
</div>

<script>
    $(document).ready(function () {
        initSingleUploader('#{{ $id }}', {
            files: {!! json_encode($value) !!},
            extensions: {!! json_encode($extensions) !!},
            url: '{!! $url !!}',
			csrf_token: '{{ $csrf_token }}',
            column: "{{ $column }}",
        });
    })

</script>
