<!DOCTYPE html>
<html class dir="<?= $site->direction; ?>" lang="<?= $site->language; ?>">
  <head>
    <meta charset="<?= $site->charset; ?>">
    <meta content="width=device-width" name="viewport">
    <?php if ($w = w($page->description ?? $site->description ?? "")): ?>
      <meta content="<?= $w; ?>" name="description">
    <?php endif; ?>
    <?php if ('archive' === $page->x): ?>
      <!-- Prevent search engines from indexing pages with `archive` state -->
      <meta content="noindex" name="robots">
    <?php endif; ?>
    <meta content="<?= $page->author; ?>" name="author">
    <title>
      <?= w($t->reverse); ?>
    </title>
    <link href="<?= $url; ?>/favicon.ico" rel="icon">
    <link href="<?= $url->clean; ?>" rel="canonical">
  </head>
  <body>
    <div class="body">
      <?= self::header(); ?>
      <?= self::image(); ?>
      <?= self::nav(); ?>
      <?= self::links(); ?>
      <?= $alert; ?>
      <div class="content">
        <main class="main">
          <header>
            <h2>Arsip 2020</h2>
            <p>Lorem ipsum dolor sit amet.</p>
          </header>
