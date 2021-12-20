<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 */

use App\Admin\Extensions\Editor5;
use App\Admin\Extensions\Media\MediaLibraryFile;
use App\Admin\Extensions\Media\MediaLibraryMultipleFile;
use Encore\Admin\Form;

Form::extend('mediaLibrary', MediaLibraryFile::class);
Form::extend('multipleMediaLibrary', MediaLibraryMultipleFile::class);
Form::extend('editor', Editor5::class);
