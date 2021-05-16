<aside class="aside">
  <?php if (isset($state->x->tag)): ?>
    <?= self::widget('tag', [
        'title' => i('Tags')
    ]); ?>
  <?php else: ?>
    <?= self::widget([
        'title' => i('Tags'),
        'content' => '<p>' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/tag" target="_blank">tag</a>']) . '</p>'
    ]); ?>
  <?php endif; ?>
</aside>
