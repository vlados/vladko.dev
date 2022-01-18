<?php

namespace App\Csp;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Basic;

class MyCustomPolicy extends Basic
{
    private string $assets_url;

    public function configure()
    {
        $this->assets_url = config('app.asset_url') ?? config('app.url');
        if (app()->environment('local')) {
            $this->assets_url .= ' http://localhost:8080';
        }

        $this
            ->addDirective(Directive::BASE, Keyword::SELF)
            ->addDirective(Directive::CONNECT, Keyword::SELF)
            ->addDirective(Directive::DEFAULT, Keyword::SELF)
            ->addDirective(Directive::DEFAULT, $this->assets_url)
            ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
            ->addDirective(Directive::MEDIA, $this->assets_url)
            ->addDirective(Directive::OBJECT, Keyword::NONE)
            ->addDirective(Directive::CONNECT, 'https://www.google-analytics.com');

        $this->defineScripts();
        $this->defineImages();
        $this->defineStyles();

        if (app()->environment('local')) {
            $this->addDirective(Directive::IMG, '*');
            $this->addDirective(Directive::IMG, 'https://images.unsplash.com/');
            $this->addDirective(Directive::CONNECT, 'ws://localhost:8080');
            $this->addDirective(Directive::CONNECT, 'http://localhost:8080');
        }
    }

    private function defineStyles()
    {
        $this->addDirective(Directive::STYLE, $this->assets_url)
            ->addDirective(Directive::STYLE, Keyword::UNSAFE_INLINE);

        if (request()->is('admin/*')) {
            $this
                ->addDirective(Directive::STYLE, 'https://cdn.jsdelivr.net/')
                ->addDirective(Directive::STYLE, 'https://cdn.ckeditor.com/');
        }
    }

    private function defineScripts()
    {
        $this
            ->addDirective(Directive::SCRIPT, $this->assets_url)
            ->addDirective(Directive::SCRIPT, Keyword::SELF)
            ->addDirective(Directive::SCRIPT, Keyword::UNSAFE_EVAL)
            ->addDirective(Directive::SCRIPT, Keyword::UNSAFE_INLINE)
            ->addDirective(Directive::SCRIPT, 'https://www.googletagmanager.com')
            ->addDirective(Directive::SCRIPT, 'https://www.google-analytics.com');

        if (request()->is('admin/*')) {
            $this
                ->addDirective(Directive::SCRIPT, 'https://cdn.jsdelivr.net/')
                ->addDirective(Directive::SCRIPT, 'https://npmcdn.com/')
                ->addDirective(Directive::SCRIPT, 'https://cdn.ckeditor.com/');
        }
    }

    private function defineImages()
    {
        $this->addDirective(Directive::IMG, $this->assets_url)
            ->addDirective(Directive::IMG, 'https://www.google-analytics.com')
            ->addDirective(Directive::IMG, 'https://img.shields.io')
            ->addDirective(Directive::IMG, Keyword::SELF);

        if (request()->is('admin/*')) {
            $this->addDirective(Directive::IMG, 'data:');
        }
    }
}
