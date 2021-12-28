<?php

$z = defined('TEST') && TEST ? '.' : '.min.';
Asset::set(__DIR__ . D . 'asset' . D . 'index' . $z . 'css', 20);

$GLOBALS['links'] = new Anemone((static function($links, $state, $url) {
    $index = LOT . D . 'page' . D . trim(strtr($state->route, '/', D), D) . '.page';
    $path = $url->path . '/';
    foreach (g(LOT . D . 'page', 'page') as $k => $v) {
        // Exclude home page
        if ($k === $index) {
            continue;
        }
        $v = new Page($k);
        // Add current state
        $v->current = 0 === strpos($path, '/' . $v->name . '/');
        $links[$k] = $v;
    }
    ksort($links);
    return $links;
})([], $state, $url));

$defaults = ['route-blog' => '/article'];

foreach ($defaults as $k => $v) {
    !State::get($k) && State::set($k, $v);
}

Hook::set('route.archive', function($query) {
    $archive = new Time(substr_replace('1970-01-01-00-00-00', $query, 0, strlen($query)));
    Alert::info('Showing %s published in %s.', ['posts', '<em>' . $archive->i((false === strpos($query, '-') ? "" : '%B ') . '%Y') . '</em>']);
});

Hook::set('route.search', function($query) {
    Alert::info('Showing %s matched with query %s.', ['posts', '<em>' . $query . '</em>']);
});

Hook::set('route.tag', function($query) {
    if (is_file($file = LOT . D . 'tag' . D . $query . '.page')) {
        $tag = new Tag($file);
        Alert::info('Showing %s tagged in %s.', ['posts', '<em>' . $tag->title . '</em>']);
    }
});