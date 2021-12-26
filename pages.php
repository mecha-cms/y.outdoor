<?= self::before(); ?>
<article class="page" id="page:<?= $page->id; ?>">
  <header>
    <?php if ($title = $page->title): ?>
      <h2>
        <?= $title; ?>
      </h2>
    <?php endif; ?>
    <?php if ($description = $page->description): ?>
      <p>
        <?= $description; ?>
      </p>
    <?php endif; ?>
  </header>
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
          <?php $excerpt = '<p>' . To::description($page->content, 250) . '</p>'; ?>
        <?php endif; ?>
        <?= preg_replace('/<a(\s[^>]*?)?>|<\/a>/', "", $excerpt); ?>
        <p>
          <a href="<?= $page->url; ?>#next:<?= $page->id; ?>" role="button">
            <?= i('Read More'); ?>
          </a>
        </p>
      </div>
    </article>
  <?php endforeach; ?>
  <?= self::pager(); ?>
</article>
<?= self::after(); ?>