<footer>
  <p>
    <?php

    $author = $page->author;

    if (isset($state->x->user) && $author instanceof User) {
        $author = '<a href="' . eat($author->link ?? $author->url) . '" rel="author" target="_blank">' . $author . '</a>';
    }

    if (!$author) {
        $author = '<em>' . i('Anonymous') . '</em>';
    }

    $time = '<time datetime="' . eat($page->time->format('c')) . '">' . $page->time('%I:%M %p') . '</time>';

    ?>
    <?= i('Posted by %s at %s', [$author, $time]); ?>
    <?php

    if (isset($state->x->tag)) {

        echo '<br>';

        $tags = [];

        if ($tags_data = $page->tags) {
            foreach ($tags_data as $tag) {
                $tags[$title = $tag->title] = '<a href="' . eat($tag->url) . '" rel="tag">' . $title . '</a>';
            }
        }

        ksort($tags);

        echo i('Tag' . (1 === ($count = count($tags)) ? "" : 's')) . ': ' . ($count ? implode(', ', $tags) : '<em>' . i('Untagged') . '</em>');

    }

    ?>
  </p>
</footer>