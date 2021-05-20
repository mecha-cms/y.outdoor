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
        'chunk' => 5,
        'shake' => true,
        'sort' => [-1, 'time']
    ]); ?>
  <?php else: ?>
    <?= self::widget('page', [
        'title' => i('Recent Posts'),
        'chunk' => 5,
        'sort' => [-1, 'time']
    ]); ?>
  <?php endif; ?>
</aside>
