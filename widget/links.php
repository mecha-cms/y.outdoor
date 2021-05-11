<?php

$content = "";
$clean = $url->clean;

if (!empty($lot['lot'])) {
    $content .= '<ul>';
    foreach ((array) $lot['lot'] as $k => $v) {
        if (0 === strpos($clean . '/', $k . '/')) {
            $content .= '<li class="current">';
        } else {
            $content .= '<li>';
        }
        $content .= '<a href="' . $k . '">';
        $content .= $v;
        $content .= '</a>';
        $content .= '</li>';
    }
    $content .= '</ul>';
}

echo self::widget([
    'title' => $title ?? "",
    'content' => $content
]);
