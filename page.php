<?= self::enter(); ?>
<?php if ($page->exist): ?>
  <article class="page" id="page:<?= $page->id; ?>">
    <header>
      <?php if ($site->has('page') && $site->has('parent')): ?>
        <p>
          <time datetime="<?= $page->time->format('c'); ?>">
            <?= $page->time($state->y->outdoor->page->timeFormat ?? '%F %T'); ?>
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
      <?php if ($link = $page->link): ?>
        <p role="group">
          <a href="<?= $link; ?>" rel="nofollow" role="button" target="_blank">
            <?= i('Visit Link'); ?>
          </a>
        </p>
      <?php endif; ?>
    </div>
    <?php if ($site->has('page') && $site->has('parent')): ?>
      <?= self::get('footer.page', ['page' => $page]); ?>
      <?php if (isset($state->x->comment)): ?>
        <?= self::comments(); ?>
      <?php endif; ?>
    <?php endif; ?>
  </article>
<?php else: ?>
  <article class="page">
    <header>
      <h2>
        <?= i('Error'); ?>
      </h2>
    </header>
    <div>
      <p role="status">
        <?= i('%s does not exist.', 'Page'); ?>
      </p>
    </div>
  </article>
<?php endif; ?>
<?= self::exit(); ?>