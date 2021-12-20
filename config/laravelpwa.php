<?php

return [
    'name' => 'vladko.dev',
    'manifest' => [
        'name' => env('APP_NAME', 'vladko.dev'),
        'short_name' => 'vladko.dev',
        'start_url' => '/?pwa=1',
        'background_color' => '#ffffff',
        'theme_color' => '#ffffff',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => '#ffffff',
        'icons' => [
            [
                'path' => '/images/pwa/manifest-icon-192.maskable.png',
                'sizes' => '192x192',
                'purpose' => 'any',
            ],
            [
                'path' => '/images/pwa/manifest-icon-512.maskable.png',
                'sizes' => '512x512',
                'purpose' => 'any',
            ],
            [
                'path' => '/images/pwa/manifest-icon-192.maskable.png',
                'sizes' => '192x192',
                'purpose' => 'maskable',
            ],
            [
                'path' => '/images/pwa/manifest-icon-512.maskable.png',
                'sizes' => '512x512',
                'purpose' => 'maskable',
            ],
            [
                'path' => '/images/SVG/vladko-logo.svg',
                'sizes' => 'any',
                'type' => 'image/svg',
                'purpose' => 'any',
            ],
        ],
        'splash' => [
            '640x1136' => '/images/pwa/apple-splash-640-1136.png',
            '750x1334' => '/images/pwa/apple-splash-750-1334.png',
            '828x1792' => '/images/pwa/apple-splash-828-1792.png',
            '1125x2436' => '/images/pwa/apple-splash-1125-2436.png',
            '1242x2208' => '/images/pwa/apple-splash-1242-2208.png',
            '1242x2688' => '/images/pwa/apple-splash-1242-2688.png',
            '1536x2048' => '/images/pwa/apple-splash-1536-2048.png',
            '1668x2224' => '/images/pwa/apple-splash-1668-2224.png',
            '1668x2388' => '/images/pwa/apple-splash-1668-2388.png',
            '2048x2732' => '/images/pwa/apple-splash-2048-2732.png',
        ],
        'custom' => [],
    ],
];
