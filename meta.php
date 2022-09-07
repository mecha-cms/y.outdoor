<?php

$metas = [];

if (isset($state->x->feed)) {
    $metas[$url . ($state->pathBlog ?? '/article') . '/feed.xml'] = 'RSS';
}

if (isset($state->x->sitemap)) {
    $metas[$url . '/sitemap.xml'] = 'Sitemap';
}

if (isset($state->x->user)) {
    $route = $state->x->user->route ?? '/user';
    $route_secret = $state->x->user->guard->route ?? $route;
    if (Is::user()) {
        $metas[$url . $route_secret . '/' . $user->name . $url->query([
            'exit' => $user->token,
            'kick' => $url->path
        ])] = 'Exit';
    } else {
        $metas[$url . $route_secret . $url->query([
            'kick' => $url->path
        ])] = 'Enter';
    }
}

asort($metas);

if ($metas) {
    echo '<h2>' . i('Links') . '</h2>';
    echo '<ul>';
    foreach ($metas as $k => $v) {
        echo '<li>';
        echo '<a href="' . From::HTML($k) . '">' . i($v) . '</a>';
        echo '</li>';
    }
    echo '</ul>';
}