<aside class="aside">
  <?php if (isset($state->x->view)): ?>
    <?= self::widget('page', [
        'title' => i('Popular Posts'),
        'take' => 5,
        'sort' => [1, 'view']
    ]); ?>
  <?php else: ?>
    <?= self::widget([
        'title' => i('Popular Posts'),
        'content' => '<p>' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/view" target="_blank">view</a>']) . '</p>'
    ]); ?>
  <?php endif; ?>
</aside>
