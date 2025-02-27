<?php namespace y\outdoor;

function links(string $folder) {
    \extract(\lot(), \EXTR_SKIP);
    $r = [];
    $route_current = $url->path . '/';
    $route_index = '/' . \trim($state->route ?? 'index', '/');
    foreach (\g($folder, 'page') as $k => $v) {
        $v = new \Page($k);
        // Exclude home page
        if ($route_index === ($route = $v->route)) {
            continue;
        }
        // Add current state
        $v->current = 0 === \strpos($route_current, $route . '/');
        $r[$v->title . \P . $k] = $v;
    }
    \ksort($r);
    return \array_values($r);
}

\lot('links', new \Anemone(links(\LOT . \D . 'page')));

function page__content($content) {
    if (null === $content) {
        return $content;
    }
    \extract(\lot(), \EXTR_SKIP);
    if (!$state->is('page')) {
        return $content;
    }
    return \strtr($content, ["\f" => '<hr id="next:' . $this->id . '" role="doc-pagebreak">']);
}

function route__archive() {
    \extract(\lot());
    if ($state->is('error')) {
        return;
    }
    if (!isset($archive)) {
        return;
    }
    $t = \State::get('[x].query.archive') ?? "";
    $format = (false === \strpos($t, '-') ? "" : '%B ') . '%Y';
    if ($search = \State::get('[x].query.search')) {
        \Alert::info('Showing %s published in %s and matched with query %s.', ['posts', '<b>' . $archive->i($format) . '</b>', '<b>' . $search . '</b>']);
    } else {
        \Alert::info('Showing %s published in %s.', ['posts', '<b>' . $archive->i($format) . '</b>']);
    }
}

function route__search() {
    \extract(\lot());
    if ($state->is('error')) {
        return;
    }
    if (!$search = \State::get('[x].query.search')) {
        return;
    }
    if (!$state->is('archives') && !$state->is('tags')) {
        \Alert::info('Showing %s matched with query %s.', ['posts', '<b>' . $search . '</b>']);
    }
}

function route__tags() {
    \extract(\lot());
    if ($state->is('error')) {
        return;
    }
    if (!isset($tag)) {
        return;
    }
    if ($search = \State::get('[x].query.search')) {
        \Alert::info('Showing %s tagged in %s and matched with query %s.', ['posts', '<b>' . $tag->title . '</b>', '<b>' . $search . '</b>']);
    } else if (\State::get('[x].query.tag')) {
        \Alert::info('Showing %s tagged in %s.', ['posts', '<b>' . $tag->title . '</b>']);
    } else {
        \Alert::info('Showing all %s.', ['tags']);
    }
}

function y__alert($y) {
    foreach ($y[1] as &$v) {
        $v[2]['aria-live'] = ['error' => 'assertive', 'info' => 'off', 'success' => 'polite'][$v[2]['type'] ?? $v['type']] ?? null;
    }
    unset($v);
    return $y;
}

if (isset($state->x->alert)) {
    \Hook::set('route.archive', __NAMESPACE__ . "\\route__archive", 100.1);
    \Hook::set('route.search', __NAMESPACE__ . "\\route__search", 100.1);
    \Hook::set('route.tags', __NAMESPACE__ . "\\route__tags", 100.1);
    \Hook::set('y.alert', __NAMESPACE__ . "\\y__alert");
}

if (isset($state->x->excerpt)) {
    \Hook::set('page.content', __NAMESPACE__ . "\\page__content");
}

\Asset::set(__DIR__ . D . 'index' . (\defined("\\TEST") && \TEST ? '.' : '.min.') . 'css', 20);

$states = [
    'route-blog' => '/article',
    'x.comment.page.type' => isset($state->x->comment) ? 'Markdown' : null,
    'x.page.page.type' => isset($state->x->page) ? 'Markdown' : null
];

foreach ($states as $k => $v) {
    !\State::get($k) && null !== $v && \State::set($k, $v);
}

if (!empty($state->y->outdoor->page->header)) {
    \State::set('with.page-header', true);
}