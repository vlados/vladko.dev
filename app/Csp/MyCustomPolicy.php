<?php
namespace App\Csp;

use Spatie\Csp\Keyword;
use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class MyCustomPolicy extends Basic
{
    public function configure()
    {
        $assets_url = config('app.asset_url') ?? config('app.url');
        $this
            ->addDirective(Directive::BASE, Keyword::SELF)
            ->addDirective(Directive::CONNECT, Keyword::SELF)
            ->addDirective(Directive::DEFAULT, Keyword::SELF)
            ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
            ->addDirective(Directive::IMG, $assets_url)
            ->addDirective(Directive::MEDIA, $assets_url)
            ->addDirective(Directive::OBJECT, Keyword::NONE)
            ->addDirective(Directive::SCRIPT, $assets_url)
            ->addDirective(Directive::SCRIPT, Keyword::UNSAFE_INLINE)
            ->addDirective(Directive::SCRIPT, Keyword::UNSAFE_EVAL)
            ->addDirective(Directive::SCRIPT, 'https://www.googletagmanager.com')
            ->addDirective(Directive::SCRIPT, 'https://www.google-analytics.com')
            ->addDirective(Directive::CONNECT, 'https://www.google-analytics.com')
            ->addDirective(Directive::STYLE, $assets_url)
            ->addDirective(Directive::STYLE, Keyword::UNSAFE_INLINE);
            if(app()->environment('local')) {
                $this->addDirective(Directive::IMG, 'https://lipsum.app');
                $this->addDirective(Directive::IMG, 'https://images.unsplash.com/');

            }
    }
}
