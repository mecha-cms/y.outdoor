<aside class="aside">
  <?php if (isset($state->x->search)): ?>
    <?= self::widget('search', [
        'title' => i('Search')
    ]); ?>
  <?php else: ?>
    <?= self::widget([
        'title' => i('Search'),
        'content' => '<p>' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/search" target="_blank">search</a>']) . '</p>'
    ]); ?>
  <?php endif; ?>
  <?php if ($site->is('home')): ?>
    <?= self::widget('page', [
        'title' => i('Random Posts'),
        'take' => 5,
        'sort' => [-1, 'time'],
        'shake' => true
    ]); ?>
  <?php else: ?>
    <?= self::widget('page', [
        'title' => i('Recent Posts'),
        'take' => 5,
        'sort' => [-1, 'time']
    ]); ?>
  <?php endif; ?>
  <?= self::widget('list', [
      'title' => i('Social Links'),
      'lot' => [
          'https://facebook.com/ta.tau.taufik' => 'Facebook',
          'https://github.com/taufik-nurrohman' => 'GitHub',
          'https://instagram.com/ta.tau.taufik' => 'Instagram',
          'https://open.spotify.com/user/21ar3ejto7p7p3ybiq5obhrpq' => 'Spotify',
          'https://t.me/taufik_nurrohman' => 'Telegram',
          'https://twitter.com/ta_tau_taufik' => 'Twitter'
      ]
  ]); ?>
</aside>
