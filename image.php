<?php if ($image = Asset::URL(__DIR__ . D . 'asset' . D . 'image' . D . $state->layout->image . '.jpg')): ?>
  <figure class="image">
    <img alt="<?= i('Photo'); ?>" height="206" src="<?= $image; ?>" width="870">
  </figure>
<?php endif; ?>