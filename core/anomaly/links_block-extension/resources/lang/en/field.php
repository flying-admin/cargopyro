<?php

return [
    'text'   => [
        'name'         => 'Text',
        'instructions' => 'Specify the link text.',
        'placeholder'  => 'About Us',
    ],
    'url'    => [
        'name'         => 'URL',
        'instructions' => 'Specify a URL, URI, named route, or hash value.',
        'placeholder'  => 'about/company',
    ],
    'target' => [
        'name'         => 'Target',
        'instructions' => 'How does this link open when clicked?',
        'option'       => [
            'self'  => 'Open in the current window.',
            'blank' => 'Open in a new window.',
        ],
    ],
    'links'  => [
        'name'         => 'Links',
        'instructions' => 'Manage the links you would like to display.',
    ],
];
