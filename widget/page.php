<?php

$deep = 0;
$folder = LOT . D . 'page' . ($route ?? $state->routeBlog ?? '/article');
if ($file = exist([
    $folder . '.archive',
    $folder . '.page'
], 1)) {
    $deep = (new Page($file))->deep ?? 0;
}

$links = [];
$pages = Pages::from($folder, 'page', $deep)->sort([$sort[0] ?? -1, $sort[1] ?? 'time']);

if (!empty($shake)) {
    $pages = $pages->shake();
}

foreach ($pages->chunk($take ?? 5, 0) as $page) {
    $links[$page->url] = $page->title;
}

echo $links ? self::widget('list', [
    'links' => $links,
    'title' => $title ?? ""
]) : self::widget([
    'content' => '<p role="status">' . i('No %s yet.', ['posts']) . '</p>',
    'title' => $title ?? ""
]);