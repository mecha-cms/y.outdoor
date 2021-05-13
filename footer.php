<footer class="footer">
  <div class="asides">
  <aside class="aside">
    <div class="widget">
    <h4>Widget 1</h4>
    <details class="archive" open>
      <summary><a href="">2021</a></summary>
      <ul>
        <li><a href="">2021 December</a>
        <li><a href="">2021 November</a>
        <li><a href="">2021 October</a>
        <li><a href="">2021 September</a>
      </ul>
    </details>
    <details class="archive">
      <summary><a href="">2020</a></summary>
      <ul>
        <li><a href="">2021 December</a>
        <li><a href="">2021 November</a>
        <li><a href="">2021 October</a>
        <li><a href="">2021 September</a>
      </ul>
    </details>
    <details class="archive">
      <summary><a href="">2020</a></summary>
      <ul>
        <li><a href="">2021 December</a>
        <li><a href="">2021 November</a>
        <li><a href="">2021 October</a>
        <li><a href="">2021 September</a>
      </ul>
    </details>
    </div>
  </aside>
  <aside class="aside">
    <div class="widget">
    <h4>Widget 2</h4>
    <ul>
      <li><a>List item 1</a></li>
      <li><a>List item 2</a></li>
      <li><a>List item 3</a></li>
      <li><a>List item 4</a></li>
      <li><a>List item 5</a></li>
    </ul>
    </div>
  </aside>
  <aside class="aside">
    <div class="widget">
    <h4>Widget 3</h4>
    <ul>
      <li><a>List item 1</a></li>
      <li><a>List item 2</a></li>
      <li><a>List item 3</a></li>
      <li><a>List item 4</a></li>
      <li><a>List item 5</a></li>
    </ul>
    </div>
  </aside>
  </div>
  <div class="rights">
    <p>
      &#x00A9; <?= $date->year; ?> <a href="<?= $url; ?>">
        <?= $site->title; ?>
      </a> &#x00B7; <?= i('Designed by %s', ['<a href="https://www.styleshout.com" rel="nofollow" target="_blank">StyleShout</a>']); ?> &#x00B7; <?= i('Powered by %s', ['<a href="https://mecha-cms.com" rel="nofollow" target="_blank">Mecha ' . VERSION . '</a>']); ?>
    </p>
  </div>
</footer>
