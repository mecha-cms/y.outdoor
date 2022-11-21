<?= self::enter(); ?>
<?php if ($page->exist): ?>
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
    <?php $date_time_format = $state->y->outdoor->page->timeFormat ?? '%F %T'; ?>
    <?php $x_image = isset($state->x->image); ?>
    <?php if ($pages->count): ?>
      <?php foreach ($pages as $page): ?>
        <article class="page" id="page:<?= $page->id; ?>">
          <header>
            <p>
              <time datetime="<?= $page->time->format('c'); ?>">
                <?= $page->time($date_time_format); ?>
              </time>
            </p>
            <?php if ($title = $page->title): ?>
              <h3>
                <?php if ($link = $page->link): ?>
                  <a href="<?= $link; ?>" target="_blank">
                    &#x2bb3; <?= $title; ?>
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
            <p role="group">
              <a href="<?= $page->url; ?>#next:<?= $page->id; ?>" role="button">
                <?= i('Read More'); ?>
              </a>
              <?php if ($link = $page->link): ?>
                <a href="<?= $link; ?>" rel="nofollow" role="button" target="_blank">
                  <?= i('Visit Link'); ?>
                </a>
              <?php endif; ?>
            </p>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <?php if ($site->has('part')): ?>
        <p role="status">
          <?= i('No more %s to show.', 'pages'); ?>
        </p>
      <?php else: ?>
        <p role="status">
          <?= i('No %s yet.', 'pages'); ?>
        </p>
      <?php endif; ?>
    <?php endif; ?>
    <?= self::pager(); ?>
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