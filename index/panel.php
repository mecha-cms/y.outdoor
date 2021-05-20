<?php

if ('.state' === $_['path']) {
    $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['file']['lot']['fields']['lot']['blog'] = [
        'type' => 'text',
        'name' => 'state[path-blog]',
        'description' => 'Determine the default blog path.',
        'hint' => '/article',
        'value' => $state->pathBlog,
        'stack' => 100
    ];
}
