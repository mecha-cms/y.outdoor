<?php if ($image = Asset::URL(__DIR__ . DS . 'asset' . DS . 'jpg' . DS . 'image' . DS . $state->layout->image . '.jpg')): ?>
  <figure class="image">
    <img alt="<?= i('Photo'); ?>" height="206" src="<?= $image; ?>" width="870">
  </figure>
<?php endif; ?>