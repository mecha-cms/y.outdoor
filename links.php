<h2><?= i('Links'); ?></h2>
<ul>
  <li>
    <a href="<?= $url; ?>/sitemap">
      <?= i('Sitemap'); ?>
    </a>
  </li>
  <li>
    <a href="<?= $url . $state->{'path-blog'}; ?>/feed.xml">
      <?= i('RSS'); ?>
    </a>
  </li>
</ul>
