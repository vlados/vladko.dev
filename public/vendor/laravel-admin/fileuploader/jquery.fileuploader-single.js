function initSingleUploader(id, options) {
	var defaultOptions = {
		limit: 1,
		fileMaxSize: 20,
		extensions: ['image/*'],
		enableApi: true,
		onRemove: function (item) {
			// send request
			if (item.data.media_id) {
				var params = {
					type: 'PUT',
					url: options['url'],
					data: {
						_token: options['csrf_token'],
						_method: 'PUT',
						column: options['column'],
						_media_delete: item.data.media_id,
					}
				}
				$.ajax(params);
			}
		},
		thumbnails: {
			onImageLoaded: function (item) {
				if (!item.html.find('.fileuploader-action-edit').length)
					item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-popup fileuploader-action-edit" title="Edit"><i></i></a>');
			}
		},
		editor:false,
		captions: {
			feedback: 'Добави или Хвърли файлове',
			setting_download:
				'Свали',
			setting_edit:
				'Редактирай заглавието',
			setting_rename:
				'Rename',
			rename:
				'Enter the new file name:',
			renameError:
				'Please enter another name.',
			imageSizeError:
				'The image ${name} is too small.',
		}
	};
	if (typeof options !== 'undefined') {
		$.extend(defaultOptions, options);
	}
	$(id).fileuploader(defaultOptions);
}

