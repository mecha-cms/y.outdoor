<?php

$links = [];

if (isset($state->x->feed)) {
    $links[$url . ($state->pathBlog ?? '/article') . '/feed.xml'] = 'RSS';
}

if (isset($state->x->sitemap)) {
    $links[$url . '/sitemap.xml'] = 'Sitemap';
}

if (isset($state->x->user)) {
    $x_user_path = $state->x->user->path ?? '/user';
    if (Is::user()) {
        $links[$url . $x_user_path . '/' . $user->name . $url->query('&', [
            'exit' => $user->token,
            'kick' => $url->path
        ])] = 'Exit';
    } else {
        $links[$url . $x_user_path . $url->query('&', [
            'kick' => $url->path
        ])] = 'Enter';
    }
}

asort($links);

echo '<h2>' . i('Links') . '</h2>';
if ($links) {
    echo '<ul>';
    foreach ($links as $k => $v) {
        echo '<li>';
        echo '<a href="' . From::HTML($k) . '">' . i($v) . '</a>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>' . i('No links yet.') . '</p>';
}
