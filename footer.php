<footer class="footer">
  <div>
    <?= self::aside('col-1'); ?>
    <?= self::aside('col-2'); ?>
    <?= self::aside('col-3'); ?>
  </div>
  <div>
    <p>
      <span>
        &#x00A9; <?= $date->year; ?> <a href="<?= $url; ?>">
          <?= $site->title; ?>
        </a>
      </span>
      <span>
        <?= i('Designed by %s', ['<a href="https://www.styleshout.com" rel="nofollow" target="_blank">StyleShout</a>']); ?>
      </span>
      <span>
        <?= i('Powered by %s', ['<a href="https://mecha-cms.com" rel="nofollow" target="_blank">Mecha ' . VERSION . '</a>']); ?>
      </span>
    </p>
  </div>
</footer>
