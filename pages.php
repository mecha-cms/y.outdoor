<?= self::enter(); ?>
<?php if ($page->exist): ?>
  <article class="page" id="page:<?= eat($page->id); ?>">
    <?php if ($site->with('page-header')): ?>
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
    <?php endif; ?>
    <?php $date_time_format = $state->y->outdoor->page->timeFormat ?? '%F %T'; ?>
    <?php $x_image = isset($state->x->image); ?>
    <?php if ($pages->count): ?>
      <?php foreach ($pages as $page): ?>
        <article class="page" id="page:<?= eat($page->id); ?>">
          <header>
            <p>
              <time datetime="<?= eat($page->time->format('c')); ?>">
                <?= $page->time($date_time_format); ?>
              </time>
            </p>
            <?php if ($title = $page->title): ?>
              <h3>
                <?php if ($link = $page->link): ?>
                  <a href="<?= eat($link); ?>" target="_blank">
                    &#x27a0; <?= $title; ?>
                  </a>
                <?php else: ?>
                  <?php $children = $page->children; ?>
                  <a href="<?= eat($page->url . ($children && $children->count ? '/1' : "")); ?>">
                    <?= $title; ?>
                  </a>
                <?php endif; ?>
              </h3>
            <?php endif; ?>
          </header>
          <?php if ($x_image && $image = $page->image(120, 120, 100)): ?>
            <figure>
              <img alt="" height="120" src="<?= eat($image); ?>" width="120">
            </figure>
          <?php endif; ?>
          <div>
            <?= $page->excerpt ?? '<p>' . To::description($page->description ?? $page->content, 250) . '</p>'; ?>
            <p role="group">
              <a href="<?= eat($page->url); ?>#next:<?= eat($page->id); ?>">
                <?= i('Read More'); ?>
              </a>
              <?php if ($link = $page->link): ?>
                <a href="<?= eat($link); ?>" rel="nofollow" target="_blank">
                  <?= i('Visit Link'); ?>
                </a>
              <?php endif; ?>
            </p>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <?php if ($site->part > 1): ?>
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