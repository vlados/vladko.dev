<?php

namespace App\Admin\Extensions\Media;

use Encore\Admin\Form;
use Encore\Admin\Form\Field;
use Encore\Admin\Form\Field\UploadField;
use Encore\Admin\Form\NestedForm;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaLibraryBase extends Field
{
    use UploadField;
    private bool $responsive = false;
    private $extensions = ['image/*'];

    protected $view = 'admin::form.fileuploader';

    protected static $js = [
        '/vendor/laravel-admin/fileuploader/jquery.fileuploader.js',
        '/vendor/laravel-admin/fileuploader/jquery.fileuploader-gallery.js',
    ];

    protected static $css = [
        '/vendor/laravel-admin/fileuploader/jquery.fileuploader.min.css',
        '/vendor/laravel-admin/fileuploader/font/font-fileuploader.css',
        '/vendor/laravel-admin/fileuploader/jquery.fileuploader-gallery.css',
    ];

    public function responsive()
    {
        $this->responsive = true;

        return $this;
    }

    public function objectUrl($mediaId)
    {
        return $this->form->model()->media()->find($mediaId)->getFullUrl('thumb');
    }

    public function original()
    {
        if (empty($this->original)) {
            return [];
        }

        return $this->original;
    }

    public function uploadMedia(UploadedFile $file = null)
    {
        $filename = null;
        if ($this->form->model()->slug) {
            $filename = Str::singular($this->column()) . '-' . $this->form->model()->slug;
            $existing = Media::where('name', 'ilike', $filename)->where('collection_name', $this->column())->count();
            if ($existing) {
                $filename = $filename . '-' . ($existing);
            }
        }

        if ($filename) {
            $media = $this->form
                ->model()
                ->addMedia($file)
                ->usingName($filename)
                ->usingFileName($filename . '.' . $file->clientExtension())
                ->preservingOriginal();
        } else {
            $media = $this->form
                ->model()
                ->addMedia($file)
                ->preservingOriginal();
        }

        if ($this->responsive) {
            $media->withResponsiveImages();
        }

        $media = $media
            ->toMediaCollection($this->column())
            ->toArray();

        $media[NestedForm::REMOVE_FLAG_NAME] = 0;

        return tap($media, function () {
            $this->name = null;
        });
    }

    public function allowExtensions($extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function render()
    {
        $currentUrl = url()->current();
        if ($this->form instanceof Form) {
            $currentUrl = $this->form->resource() . '/' . $this->form->model()->getKey();
        }

        $this->addVariables([
            'extensions' => $this->extensions,
            'url' => $currentUrl,
            'csrf_token' => csrf_token(),
            'flag_sort' => static::FILE_SORT_FLAG,
            'flag_delete' => static::FILE_DELETE_FLAG,
        ]);

        return parent::render();
    }

    public function destroy()
    {
        if ($media = Media::whereId(request('_media_delete'))->first()) {
            $media->delete();
        }

        return true;
    }

    private function reorder($request)
    {
        $request = json_decode($request);
//        $request = array_reverse($request);
        $request = array_filter($request, function ($value) {
            return !is_null($value) && $value !== '';
        });
        if (is_array($request) && count($request)) {
            try {
                Media::setNewOrder($request);
            } catch (\Exception $exception) {
            }

            return true;
        } else {
            exit;
        }
    }

    public function getValidator(array $input)
    {
        if (request()->has('_media_delete')) {
            return $this->destroy();
        } elseif (request()->has('_media_reorder')) {
            return $this->reorder(request('_media_reorder'));
        } elseif (request()->has('_media_caption')) {
            return $this->setCaption(request('_media_caption'));
        }

        return parent::getValidator($input);
    }

    private function setCaption($media_id)
    {
        $media = Media::find($media_id);
        $media->setCustomProperty('caption', request('caption'));
        $media->save();
        exit(json_encode([
            'name' => $media->file_name, // file name
            'size' => $media->size, // file size in bytes
            'type' => $media->mime_type, // file MIME type
            'file' => $media->getUrl(), // file path
            'local' => $media->getPath(),
            'index' => $media->order_column,
            'data' => [
                'media_id' => $media->id,
                'url' => $media->getFullUrl(),
                'thumbnail' => $media->getFullUrl('thumb'),
                'title' => $media->getCustomProperty('caption'),
            ],
        ]));
    }
}
