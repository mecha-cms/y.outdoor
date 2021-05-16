<?php

$test = <<<HTML
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
HTML;

echo self::widget([
    'title' => $title ?? "",
    'content' => $test
]);
