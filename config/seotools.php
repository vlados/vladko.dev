<?php

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => "Vladislav Stoitsov - full-stack web developer", // set false to total remove
            'titleBefore' => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description' => 'Full-stack web developer with more than 16 years of experience leading both front-end and back-end development', // set false to total remove
            'separator' => ' - ',
            'keywords' => ['software engineer', 'web architect', 'full-stack web developer', 'SEO expert', 'security expert', 'entrepreneur'],
            'canonical' => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots' => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => 'Vladislav Stoitsov - full-stack web developer', // set false to total remove
            'description' => 'Full-stack web developer with more than 16 years of experience leading both front-end and back-end development', // set false to total remove
            'url' => null, // Set null for using Url::current(), set false to total remove
            'type' => 'business',
            'site_name' => 'vladko.dev',
            'images' => [
                ('images/vladislav stoitsov.jpg')
            ],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary',
            'site' => '@vlados',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => []
    ],
];
