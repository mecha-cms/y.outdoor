<?php

$pages = [];
$pages_data = Pages::from(LOT . DS . 'page' . ($lot['path'] ?? $state->pathBlog))->sort([$sort[0] ?? -1, $sort[1] ?? 'time']);

if (!empty($shake)) {
    $pages_data->shake();
}

$counter = isset($counter) && is_callable($counter) ? $counter : function() {};

foreach ($pages_data->chunk($chunk ?? 5, 0) as $page) {
    $count = call_user_func($counter, $page);
    $pages[$page->url] = $page->title . ($count || 0 === $count ? ' <span class="count">' . $count . '</span>' : "");
}

echo $pages ? self::widget('list', [
    'title' => $title ?? "",
    'lot' => $pages
]) : self::widget([
    'title' => $title ?? "",
    'content' => '<p>' . i('No %s yet.', ['posts']) . '</p>'
]);
