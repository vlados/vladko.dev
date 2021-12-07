<?php

namespace App\Admin\Extensions\Media;

use Encore\Admin\Form\Field\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MediaLibraryFile extends MediaLibraryBase
{
    protected $view = 'admin::form.fileuploader-single';
    protected static $js = [
        '/vendor/laravel-admin/fileuploader/jquery.fileuploader.min.js',
        '/vendor/laravel-admin/fileuploader/jquery.fileuploader-single.js',
    ];

    public function fill($data)
    {
        parent::fill($data);

        if ($this->form->model()->hasMedia($this->column())) {
            $value = $this->form->model()->getFirstMedia($this->column());
            $this->value = [
                'name' => $value->file_name, // file name
                'size' => $value->size, // file size in bytes
                'type' => $value->mime_type, // file MIME type
                'file' => $value->getUrl(), // file path
                'local' => $value->getPath(),
                'index' => $value->order_column,
                'data' => [
                    'media_id' => $value->id,
                    'url' => $value->getFullUrl(),
                    'thumbnail' => $value->getFullUrl('thumb'),
                    'title' => $value->getCustomProperty('caption') ?? $value->file_name,
                    'listProps' => [
                        'key' => $value->order_column,
                    ],
//                    "readerCrossOrigin" => "anonymous", // fix image cross-origin issue (optional)
//                    "readerForce" => true, // prevent the browser cache of the image (optional)
//                    "readerSkip" => false, // skip file from reading by rendering a thumbnail (optional)
                ],
            ];
        } else {
            $this->value = [];
        }
    }

    public function prepare($file)
    {
        if (request()->has(static::FILE_DELETE_FLAG)) {
            return $this->destroy();
        }

        if (count($file)) {
            $this->prepareMedia($file[0]);
        }
    }

    protected function prepareMedia(UploadedFile $file = null)
    {
        $this->name = $this->getStoreName($file);

        $this->form->model()->clearMediaCollection($this->column());

        return $this->uploadMedia($file);
    }

    protected function initialPreviewConfig()
    {
        $media = Media::where('id', '=', $this->value)->first();

        return [$this->getPreviewEntry($media)];
    }

    public function setOriginal($data)
    {
        $value = $this->form->model()->getMedia($this->column);
        if ($value->count()) {
            $this->original = $value[0]->id;
        }
    }
}
