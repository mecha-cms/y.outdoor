<aside class="aside">
  <?php if (isset($state->x->archive)): ?>
    <?= self::widget('archive', [
        'title' => i('Archives')
    ]); ?>
  <?php else: ?>
    <?= self::widget([
        'title' => i('Archives'),
        'content' => '<p>' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/archive" target="_blank">archive</a>']) . '</p>'
    ]); ?>
  <?php endif; ?>
</aside>
