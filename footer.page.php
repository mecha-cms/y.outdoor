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

        $r = [];

        if ($tags = $page->tags) {
            foreach ($tags->sort([1, 'title']) as $tag) {
                $r[] = '<a href="' . eat($tag->url) . '" rel="tag">' . $tag->title . '</a>';
            }
        }

        echo i('Tag' . (1 === ($count = count($r)) ? "" : 's')) . ': ' . ($count ? implode(', ', $r) : '<em>' . i('Untagged') . '</em>');

    }

    ?>
  </p>
</footer>