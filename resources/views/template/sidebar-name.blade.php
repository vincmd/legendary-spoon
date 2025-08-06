@php

    // svg for logo or icon; just path
    $logo = [
        'home' => '<path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>',
        'form' => '<path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>',
        'card' => '
                <path
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>',
        'chart' => '<path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>',
        'click' => '<path
                         d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                     </path>',
        'modals' => '<path
                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                     </path>',
        'tables' => ' <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>',
        'user' =>
            '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />',
        'computer' =>
            '  <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />',

    ];

    // sidebar button and logo
    // status is for active tab
    $sidebar_buttons = [
        [
            'status' => false,
            'name' => 'home',
            'href' => '',
            'icon' => $logo['home'],
        ],
        [
            'status' => false,
            'name' => 'acces',
            'href' => '',
            'icon' => $logo['user'],
        ],
        [
            'status' => false,
            'name' => 'services',
            'href' => '',
            'icon' => $logo['click'],
        ],
        [
            'status' => false,
            'name' => 'locket',
            'href' => '',
            'icon' => $logo['computer'],
        ],
        [
            'status' => false,
            'name' => 'running text',
            'href' => '',
            'icon' => $logo['tables'],
        ],
    ];

    // session()->put('open_tab', 'services');
    foreach ($sidebar_buttons as &$sesion_check) {
        if ($sesion_check['name'] == session('open_tab')) {
            $sesion_check['status'] = true;
        } else {
            $sesion_check['status'] = false; // Optional: reset yang lain
        }
    }
    unset($sesion_check); // Penting untuk menghindari masalah referensi setelah loop

@endphp


@include('template.sidebar.sidebar-mobile', [
    'sidebar_buttons' => $sidebar_buttons,
])
@include('template.sidebar.sidebar-desktop', [
    'sidebar_buttons' => $sidebar_buttons,
])
