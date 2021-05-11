<?php

$content = "";

if (isset($state->x->search)) {
    $action = $site->is('page') ? $parent->url : $page->url;
    $value = Get::get($key = $state->x->search->key ?? 'q');
    $content .= '<form action="' . $action . '" class="form search" method="get">';
    $content .= '<p>';
    $content .= '<input name="' . $key . '" class="input" type="text"' . ($value ? ' value="' . From::HTML($value) . '"' : "") . '>';
    $content .= ' ';
    $content .= '<button class="button" type="submit">' . i('Search') . '</button>';
    $content .= '</p>';
    $content .= '</form>';
}

echo self::widget([
    'title' => $title ?? "",
    'content' => $content
]);
