<?= self::before(); ?>
<article class="page" id="page:<?= $page->id; ?>">
  <header>
    <p>
      <time datetime="<?= $page->time->format('c'); ?>">
        <?= $page->time->{r('-', '_', $site->language)}; ?>
      </time>
    </p>
    <?php if ($title = $page->title): ?>
      <h2>
        <?= $title; ?>
      </h2>
    <?php endif; ?>
  </header>
  <div>
    <?= $page->content; ?>
  </div>
  <?= self::get('--page.footer', ['page' => $page]); ?>
</article>
<?= self::after(); ?>
