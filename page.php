<?= self::before(); ?>
<article class="page" id="page:<?= $page->id; ?>">
  <header>
    <?php if ($site->has('parent')): ?>
      <p>
        <time datetime="<?= $page->time->format('c'); ?>">
          <?= $page->time->{r('-', '_', $site->language)}; ?>
        </time>
      </p>
    <?php endif; ?>
    <?php if ($title = $page->title): ?>
      <h2>
        <?= $title; ?>
      </h2>
    <?php endif; ?>
  </header>
  <div>
    <?= $page->content; ?>
  </div>
  <?php if ($site->has('parent')): ?>
    <?= self::get('footer.page', ['page' => $page]); ?>
    <?php if (isset($state->x->comment)): ?>
      <?= self::comments(); ?>
    <?php endif; ?>
  <?php endif; ?>
</article>
<?= self::after(); ?>
