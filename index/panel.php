<?php

if ('POST' === $_SERVER['REQUEST_METHOD'] && '.state' === $_['path'] && empty($_POST['state']['y']['outdoor']['page']['header'])) {
    // Set default value to `false`
    $_POST['state']['y']['outdoor']['page']['header'] = false;
}

Hook::set('_', function ($_) use ($state, $url) {
    if ('.state' === $_['path']) {
        $banners = [0 => 'None'];
        foreach (g(LOT . D . 'y' . D . 'outdoor' . D . 'banner', 'jpg') as $k => $v) {
            $banners[$n = basename($k, '.jpg')] = To::title($n);
        }
        $time = new Time;
        $formats = [];
        foreach ([
            '%A, %B %d, %Y',
            '%A, %d %B %Y',
            '%F %T',
            '%Y/%m/%d %I:%M %p',
            '%Y/%m/%d %T',
            '%c',
            '%x',
        ] as $format) {
            $formats[$format] = $time($format);
        }
        $lot = [];
        foreach (Pages::from(LOT . D . 'page', 'archive,page')->sort([1, 'title']) as $v) {
            $lot[strtr($v->url, [
                $url . '/' => '/'
            ])] = $v->title;
        }
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields'] = [
            'lot' => [],
            'type' => 'fields'
        ];
        $banner = $state->y->outdoor->banner ?? 0;
        $banner_file = __DIR__ . D . '..' . D . 'banner' . D . $banner . '.jpg';
        $banner_link = is_file($banner_file) ? To::URL($banner_file) : null;
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields']['lot']['banner'] = [
            'description' => $banner_link ? 'If the image below looks broken, the image file may no longer exist.' : null,
            'field-exit' => $banner_link ? '<p><img alt="' . i('Banner') . '" src="' . $banner_link . '?v=' . filemtime($banner_file) . '" style="display: block;"></p>' : null,
            'lot' => $banners,
            'name' => 'state[y][outdoor][banner]',
            'stack' => 100,
            'title' => 'Banner',
            'type' => 'item',
            'value' => $banner
        ];
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields']['lot']['time-format'] = [
            'block' => true,
            'lot' => $formats,
            'name' => 'state[y][outdoor][page][timeFormat]',
            'stack' => 110,
            'title' => 'Date/Time',
            'type' => 'item',
            'value' => $state->y->outdoor->page->timeFormat ?? '%F %T'
        ];
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields']['lot']['options'] = [
            'lot' => [
                'header' => 'Show page header on pages layout.'
            ],
            'name' => 'state[y][outdoor][page]',
            'stack' => 120,
            'title' => 'Options',
            'type' => 'items',
            'values' => [
                'header' => !empty($state->y->outdoor->page->header) ? true : null
            ]
        ];
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields']['lot']['route-blog'] = [
            'description' => 'Choose default page for the blog route.',
            'lot' => $lot,
            'name' => 'state[route-log]',
            'stack' => 130,
            'title' => 'Route',
            'type' => 'option',
            'value' => $state->routeLog
        ];
    }
    return $_;
}, 0);