<?php

/*
 * For more details about the configuration, see:
 * https://sweetalert2.github.io/#configuration
 */
return [
    'alert' => [
//        'iconHtml' => '<div class="flex-shrink-0">
//            <svg class="h-6 w-6 text-green-400" x-description="Heroicon name: outline/check-circle" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
//  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
//</svg>
//          </div>',
        'customClass' => [
            'container' => 'fixed !left-0 !right-0 !translate-x-0 lg:transform lg:!-translate-x-1/2 translate lg:!left-1/2 transform lg:!w-2/5 !max-w-screen-lg !md:top-5 lg:min-w-max md:bottom-auto',
            'popup' => 'lg:mt-12 w-max bg-white shadow-xl rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5',
        ],
        'confirmButtonText' => 'Ok',
        'cancelButtonText' => 'Cancel',
        'showCancelButton' => false,
        'showConfirmButton' => false,
        'showCloseButton' => true,
        'position' => 'top',
        'timer' => 350000,
        'timerProgressBar' => true,
        'toast' => true,
        'text' => '',
    ],
    'confirm' => [
        'icon' => 'warning',
        'timer' => null,
        'confirmButtonColor' => '#3085d6',
        'cancelButtonColor' => '#d33',
        'iconHtml' => '<div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
            <svg class="h-6 w-6 text-green-600" x-description="Heroicon name: outline/check" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
</svg>
          </div>',
        'customClass' => [
            'container' => 'fixed top-0 bottom-0',
            'popup' => 'align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full',
            'content' => 'text-sm text-gray-500 mt-2',
//                "header" => 'sm:flex sm:items-start',
            'title' => 'mt-3 text-center sm:mt-5 text-lg leading-6 font-medium text-gray-900 text-sm',
//
            'actions' => 'mt-5 sm:mt-4 sm:flex sm:flex-row gap-3',
            'confirmButton' => 'inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm',
            'cancelButton' => 'mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm',
            'closeButton' => 'bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-0',
            'denyButton' => 'w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm',
//                "icon" => '...',
            'image' => 'hidden md:inline-block',
//                "htmlContainer" => '...',
//                "input" => '...',
//                "inputLabel" => '...',
//                "validationMessage" => '...',
//                "loader" => '...',
//                "footer" => '....'
        ],
        'buttonsStyling' => false,
        'focusConfirm' => false,
        'toast' => false,
        'position' => 'center',
        'showCloseButton' => true,
        'showCancelButton' => true,
        'showConfirmButton' => true,
        'cancelButtonText' => 'Откажи',
        'onConfirmed' => 'confirmed',
        'onCancelled' => 'cancelled',
    ],
];
