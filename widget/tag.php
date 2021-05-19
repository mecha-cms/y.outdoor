<?php

$tags = [];
$tags_found = [];

foreach (g(LOT . DS . 'page' . DS . ($state->pathBlog ?? '/article'), 'page') as $k => $v) {
    $page = new Page($k);
    $v = (array) ($page['kind'] ?? []);
    $v && ($tags_found = array_merge($tags_found, $v));
}

foreach (array_count_values($tags_found) as $k => $v) {
    if ($n = To::tag($k)) {
        if (is_file($f = LOT . DS . 'tag' . DS . $n . '.page')) {
            $tag = new Tag($f);
            $tags[$tag->url] = $tag->title . ' <span class="count">' . $v . '</span>';
        }
    }
}

asort($tags);

echo self::widget('list', [
    'title' => $title ?? "",
    'lot' => $tags
]);
