<aside class="aside">
  <?= self::widget('search', [
      'title' => i('Search')
  ]); ?>
  <?= self::widget('links', [
      'title' => i('Links'),
      'lot' => [
          'http://example.com/1' => 'Link 1',
          'http://example.com/2' => 'Link 2',
          'http://example.com/3' => 'Link 3',
          'http://example.com/4' => 'Link 4'
      ]
  ]); ?>
</aside>

