<?php

$content = "";
$clean = $url->clean;

if (!empty($links)) {
    $content .= '<ul>';
    foreach ((array) $links as $link => $text) {
        if (0 === strpos($clean . '/', $link)) {
            $content .= '<li class="current">';
        } else {
            $content .= '<li>';
        }
        $content .= '<a href="' . $link . '">';
        $content .= $text;
        $content .= '</a>';
        $content .= '</li>';
    }
    $content .= '</ul>'
}

echo self::widget([
    'title' => $title ?? "",
    'content' => $content
]);
