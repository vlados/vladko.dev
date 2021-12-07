<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class Editor5 extends Field
{
    protected $view = 'admin::form.editor';

    protected static $js = [
        'https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.1/classic/ckeditor.js',
    ];

    public function render()
    {
        $this->script = "
        ClassicEditor
				.create( document.querySelector( '#{$this->column}' ) ,{
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ],
				})
				.then( editor => {
				} )
				.catch( error => {
					console.error( error );
				} );
		";

        return parent::render();
    }
}
