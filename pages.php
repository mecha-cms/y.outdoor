<?= self::before(); ?>
<?php foreach ($pages as $page): ?>
  <article class="page" id="page:<?= $page->id; ?>">
    <header>
      <p>
        <time datetime="<?= $page->time->format('c'); ?>">
          <?= $page->time->{r('-', '_', $site->language)}; ?>
        </time>
      </p>
      <?php if ($title = $page->title): ?>
        <h3>
          <?php if ($link = $page->link): ?>
            <a href="<?= $link; ?>" target="_blank">
              <?= $title; ?>
            </a>
          <?php else: ?>
            <a href="<?= $page->url; ?>">
              <?= $title; ?>
            </a>
          <?php endif; ?>
        </h3>
      <?php endif; ?>
    </header>
    <?php if ($image = $page->image(100, 100)): ?>
      <figure>
        <img alt="" height="100" src="<?= $image; ?>" width="100">
      </figure>
    <?php endif; ?>
    <div>
      <?php if (!$excerpt = $page->excerpt): ?>
        <?php $excerpt = '<p>' . To::excerpt($page->content) . '</p>'; ?>
      <?php endif; ?>
      <?= preg_replace('/<a(\s[^>]*?)?>|<\/a>/', "", $excerpt); ?>
    </div>
  </article>
<?php endforeach; ?>
<nav class="pager">
  <ul>
    <li>
      <?php if ($prev = $pager->prev): ?>
        <a href="<?= $prev->link; ?>" rel="prev">
          <?= i('Newer'); ?>
        </a>
      <?php endif; ?>
    </li>
    <li>
      <?php if ($parent = $pager->parent): ?>
        <a href="<?= $parent->link; ?>">
          <?= i('Parent'); ?>
        </a>
      <?php endif; ?>
    </li>
    <li>
      <?php if ($next = $pager->next): ?>
        <a href="<?= $next->link; ?>" rel="next">
          <?= i('Older'); ?>
        </a>
      <?php endif; ?>
    </li>
  </ul>
</nav>
<?= self::after(); ?>
