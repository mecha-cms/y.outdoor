<?php

$archives = [];

$x_page_path = $state->pathBlog ?? '/article';

foreach (g(LOT . DS . 'page' . $x_page_path, 'page') as $k => $v) {
    $page = new Page($k);
    $v = $page->time;
    if ($v) {
        $v = explode('-', $v);
        $archives[$v[0]][$v[1]][] = 1;
    }
}

$content = "";

$dates = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];

$x_archive_path = $state->x->archive->path ?? '/archive';

if ($site->is('archives')) {
    $current = $archive->format('Y-m-d-H-i-s');
}

foreach ($archives as $k => $v) {
    $k = (string) $k;
    if (!isset($current)) {
        $current = $k;
    }
    $content .= '<details class="archive' . (($open = $k === explode('-', $current)[0]) ? ' current' : "") . '"' . ($open ? ' open' : "") . '>';
    $content .= '<summary>';
    $content .= '<a href="' . $url . $x_page_path . $x_archive_path . '/' . $k . '/1">';
    $content .= $k . ' <span class="count">' . count($v) . '</span>';
    $content .= '</a>';
    $content .= '</summary>';
    if (is_array($v)) {
        $content .= '<ul>';
        foreach ($v as $kk => $vv) {
            $content .= '<li' . ($k . '-' . $kk === $current ? ' class="current"' : "") . '>';
            $content .= '<a href="' . $url . $x_page_path . $x_archive_path . '/' . $k . '-' . $kk . '/1">';
            $content .= $k . ' ' . i($dates[((int) $kk) - 1]) . ' <span class="count">' . count($vv) . '</span>';
            $content .= '</a>';
            $content .= '</li>';
        }
        $content .= '</ul>';
    }
    $content .= '</details>';
}

echo self::widget([
    'title' => $title ?? "",
    'content' => $content ?: '<p>' . i('No %s yet.', ['posts']) . '</p>'
]);
