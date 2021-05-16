<?php

$content = "";

if (!isset($current)) {
    $current = $url->clean;
}

if (!isset($target)) {
    $target = "";
}

if (!empty($lot['lot'])) {
    $content .= '<ul>';
    foreach ((array) $lot['lot'] as $k => $v) {
        if (0 === strpos($current . '/', $k . '/')) {
            $content .= '<li class="current">';
        } else {
            $content .= '<li>';
        }
        $content .= '<a href="' . $k . '"' . ($target ? ' target="' . $target . '"' : "") . '>';
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
