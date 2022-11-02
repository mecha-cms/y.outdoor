<nav class="pager">
  <ul>
    <li>
      <?php if ($prev = $pager->prev): ?>
        <a href="<?= $prev->link ?? $prev->url; ?>" rel="prev">
          <?= i('Newer'); ?>
        </a>
      <?php endif; ?>
    </li>
    <li>
      <?php if ($parent = $page->parent): ?>
        <a href="<?= $parent->url; ?>">
          <?= i('Parent'); ?>
        </a>
      <?php else: ?>
        <?php if ($site->is('home')): ?>
        <?php else: ?>
          <a href="<?= $url; ?>">
            <?= i('Home'); ?>
          </a>
        <?php endif; ?>
      <?php endif; ?>
    </li>
    <li>
      <?php if ($next = $pager->next): ?>
        <a href="<?= $next->link ?? $next->url; ?>" rel="next">
          <?= i('Older'); ?>
        </a>
      <?php endif; ?>
    </li>
  </ul>
</nav>