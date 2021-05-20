<?= self::before(); ?>
<?php $x_image = isset($state->x->image); ?>
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
              &#x2BB3; <?= $title; ?>
            </a>
          <?php else: ?>
            <a href="<?= $page->url; ?>">
              <?= $title; ?>
            </a>
          <?php endif; ?>
        </h3>
      <?php endif; ?>
    </header>
    <?php if ($x_image && $image = $page->image(120, 120, 100)): ?>
      <figure>
        <img alt="" height="120" src="<?= $image; ?>" width="120">
      </figure>
    <?php endif; ?>
    <div>
      <?php if (!$excerpt = $page->excerpt): ?>
        <?php $excerpt = '<p>' . To::excerpt($page->content) . '</p>'; ?>
      <?php endif; ?>
      <?= preg_replace('/<a(\s[^>]*?)?>|<\/a>/', "", $excerpt); ?>
      <p>
        <a class="button" href="<?= $page->url; ?>#next:<?= $page->id; ?>">
          <?= i('Read More'); ?>
        </a>
      </p>
    </div>
  </article>
<?php endforeach; ?>
<?= self::pager(); ?>
<?= self::after(); ?>
