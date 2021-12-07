function initUploader(id, options) {
	var defaultOptions = {
		limit: 100,
		fileMaxSize: 20,
		extensions: ['image/*'],
		changeInput: ' ',
		theme: 'gallery',
		enableApi: true,
		addMore: true,
		minWidth: null,
		minHeight: null,
		clipboardPaste: 5000,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
				'<ul class="fileuploader-items-list">' +
				'<li class="fileuploader-input"><div class="fileuploader-input-inner"><div class="fileuploader-main-icon"></div> <span>${captions.feedback}</span></div></li>' +
				'</ul>' +
				'</div>',
			item:
				'<li class="fileuploader-item file-has-popup">' +
				'<div class="fileuploader-item-inner">' +
				'<div class="actions-holder">' +
				'<a class="fileuploader-action fileuploader-action-sort is-hidden" title="${captions.sort}"><i></i></a>' +
				'<a class="fileuploader-action fileuploader-action-settings is-hidden" title="${captions.edit}"><i></i></a>' +
				'<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
				'<div class="gallery-item-dropdown">' +
				'<a href="${data.url}" download>${captions.setting_download}</a>' +
				'<a class="fileuploader-action-popup">${captions.setting_edit}</a>' +
				'<a class="gallery-action-rename">${captions.setting_rename}</a>' +
				'<a class="gallery-action-asmain">${captions.setting_asMain}</a>' +
				'</div>' +
				'</div>' +
				'<div class="thumbnail-holder">' +
				'${image}' +
				'<span class="fileuploader-action-popup"></span>' +
				'<div class="progress-holder"><span></span>${progressBar}</div>' +
				'</div>' +
				'<div class="content-holder"><h5 title="${data.title}">${data.title}</h5><span>${size2}</span></div>' +
				'<div class="type-holder">${icon}</div>' +
				'</div>' +
				'</li>',
			item2:
				'<li class="fileuploader-item file-has-popup file-main-${data.isMain}">' +
				'<div class="fileuploader-item-inner">' +
				'<div class="actions-holder">' +
				'<a class="fileuploader-action fileuploader-action-sort" title="${captions.sort}"><i></i></a>' +
				'<a class="fileuploader-action fileuploader-action-settings" title="${captions.edit}"><i></i></a>' +
				'<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
				'<div class="gallery-item-dropdown">' +
				'<a href="${data.url}" download>${captions.setting_download}</a>' +
				'<a class="gallery-action-rename">${captions.setting_rename}</a>' +
				'</div>' +
				'</div>' +
				'<div class="thumbnail-holder">' +
				'${image}' +
				'<span class="fileuploader-action-popup"></span>' +
				'</div>' +
				'<div class="content-holder"><a class="gallery-action-rename" style="display:block;font-weight: bold; cursor: pointer">${data.title}</a><span>${size2}</span></div>' +
				'<div class="type-holder">${icon}</div>' +
				'</div>' +
				'</li>',
			startImageRenderer: true,
			pdf: true,
			canvasImage: true,
			removeConfirmation: true,
			exif: true,

			onItemShow:

				function (item, listEl, parentEl, newInputEl, inputEl) {
					var api = $.fileuploader.getInstance(inputEl),
						color = api.assets.textToColor(item.format),
						$plusInput = listEl.find('.fileuploader-input'),
						$progressBar = item.html.find('.progress-holder');

					// put input first in the list
					$plusInput.prependTo(listEl);

					// color the icon and the progressbar with the format color
					item.html.find('.type-holder .fileuploader-item-icon')[api.assets.isBrightColor(color) ? 'addClass' : 'removeClass']('is-bright-color').css('backgroundColor', color);
					$progressBar.css('backgroundColor', color);
				}

			,
			onImageLoaded: function (item, listEl, parentEl, newInputEl, inputEl) {
				// invalid image?
				if (item.image.hasClass('fileuploader-no-thumbnail')) {
					// callback goes here
				}

				// check image size and ratio?
				if (item.reader.node && item.appended === false && ((options.minWidth && item.reader.width <= options.minWidth) || (options.minHeight && item.reader.height <= options.minHeight))) {
					swal(item.name + ' не може да бъде качен', ' Минималните размери на изображението трябва да са ' + options.minWidth + 'x' + options.minHeight + '.<br> Каченото изображение е с размери ' + item.reader.width + 'x' + item.reader.height + 'px', 'error');
					item.remove();
					return false;
				}
			},
			onItemRemove: function (html) {
				html.fadeOut(250);
			}
		}
		,
		dragDrop: {
			container: null
		}
		,
		sorter: {
			onSort: function (list, listEl, parentEl, newInputEl, inputEl) {
				var api = $.fileuploader.getInstance(inputEl),
					fileList = api.getFiles(),
					list = [];

				// prepare the sorted list
				api.getFiles().forEach(function (item) {
					list.push(item.data.media_id);
				});

				// send request
				var params = {
					type: 'PUT',
					url: options['url'],
					data: {
						_token: options['csrf_token'],
						_method: 'PUT',
						column: options['column'],
						_media_reorder: JSON.stringify(list),
					}
				}
				$.ajax(params);
			}
		}
		,
		afterRender: function (listEl, parentEl, newInputEl, inputEl) {
			var api = $.fileuploader.getInstance(inputEl),
				$plusInput = listEl.find('.fileuploader-input');

			// bind input click
			$plusInput.on('click', function () {
				api.open();
			});

			// bind dropdown buttons
			$('body').on('click', function (e) {
				var $target = $(e.target),
					$item = $target.closest('.fileuploader-item'),
					item = api.findFile($item);

				// toggle dropdown
				$('.gallery-item-dropdown').hide();
				if ($target.is('.fileuploader-action-settings') || $target.parent().is('.fileuploader-action-settings')) {
					$item.find('.gallery-item-dropdown').show(150);
				}

				// rename
				if ($target.is('.gallery-action-rename') && item && typeof item['data'] !== "undefined") {
					var currentTitle = item["data"]["title"];
					var x = prompt(api.getOptions().captions.rename, currentTitle);

					if (x && item.data.media_id) {
						var params = {
							type: 'PUT',
							url: options['url'],
							data: {
								_token: options['csrf_token'],
								_method: 'PUT',
								column: options['column'],
								_media_caption: item.data.media_id,
								caption: x
							}
						}
						$.ajax(params).done(function (result) {
							try {
								var j = JSON.parse(result);

								// update the file name and url
								if (j.data.title) {
									item.title = j.data.title;
									item.name = item.title;
									$item.find('.content-holder a').attr('title', item.name).html(item.name);
									$item.find('.gallery-item-dropdown [download]').attr('href', item.data.url);

									if (item.popup.html)
										item.popup.html.find('h5:eq(0)').text(item.name);

									if (j.url)
										item.data.url = j.url;
									if (item.appended && j.file)
										item.file = j.file;

									api.updateFileList();
								}

							} catch (e) {
								alert(api.getOptions().captions.renameError);
							}
						});

					}
				}

				// set main
				// if ($target.is('.gallery-action-asmain') && item.data.listProps) {
				//     $.post('php/ajax.php?type=asmain', {name: item.name, id: item.data.listProps.id}, function () {
				//         api.getFiles().forEach(function (val) {
				//             delete val.data.isMain;
				//             val.html.removeClass('file-main-0 file-main-1');
				//         });
				//         item.html.addClass('file-main-1');
				//         item.data.isMain = true;
				//
				//         api.updateFileList();
				//     });
				// }
			});
		}
		,
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
		}
		,
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

