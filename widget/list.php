<?php

$content = "";
$current = $current ?? $page->current ?? $url->current;
$target = $target ?? "";

if (!empty($lot['links'])) {
    foreach ((array) $lot['links'] as $k => $v) {
        $content .= '<li>';
        $content .= '<a' . ($k === $current ? ' aria-current="page"' : "") . ' href="' . eat($k) . '"' . ($target ? ' target="' . $target . '"' : "") . '>';
        $content .= $v;
        $content .= '</a>';
        $content .= '</li>';
    }
} else if (!empty($lot['list'])) {
    foreach ((array) $lot['list'] as $k => $v) {
        $content .= '<li>' . $v . '</li>';
    }
}

echo self::widget([
    'content' => $content ? '<ul>' . $content . '</ul>' : "",
    'title' => $title ?? ""
]);