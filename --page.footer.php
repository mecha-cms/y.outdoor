<footer>
  <p>
    <?php

    $author = $page->author;

    if (isset($state->x->user) && $author instanceof User) {
        $author = '<a href="' . ($author->link ?? $author->url) . '" rel="author" target="_blank">' . $author . '</a>';
    }

    if (!$author) {
        $author = '<em>' . i('Anonymous') . '</em>';
    }

    $time = '<time datetime="' . $page->time->format('c') . '">' . $page->time('%I:%M %p') . '</time>';

    ?>
    <?= i('Posted by %s on %s', [$author, $time]); ?>
    <?php

    if (isset($state->x->tag)) {

        echo '<br>';

        $tags = $page->tags ? $page->tags->map(function($tag) {
            return '<a href="' . $tag->url . '" rel="tag">' . $tag->title . '</a>';
        }) : [];

        echo i('Tag' . (1 === ($count = count($tags)) ? "" : 's')) . ': ' . ($count ? implode(', ', $tags) : '<em>' . i('Untagged') . '</em>');

    }

    ?>
  </p>
</footer>
