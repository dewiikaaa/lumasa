<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=$theme_url?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=$theme_url?>/css/styles.min.css">
    <title><?=$page_title?></title>

	<?php \Arifrh\Themes\Themes::renderCSS(); ?>

	<script>
		var site_url = '<?=site_url()?>';
		var base_url = '<?=base_url()?>';
		var theme_url = '<?=$theme_url?>';
	</script>
  </head>
  <body>
    <header class="page-header">
      <!-- Image and text -->
	  <?php $auth = new \Arifrh\Auth\Auth();
	  if ($auth->isLogged()) :
		$uri = current_url();

		$homeUrl        = site_url('home');
		$newsUrl        = site_url('news');
		$productUrl     = site_url('products');
		$maintenanceUrl = site_url('maintenance');
		$supportUrl     = site_url('support');
	  ?>
      <!-- Image and text -->
      <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
        <a class="navbar-brand" href="#">
          Aqura
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item <?=activeClass($uri, $homeUrl)?>">
              <a class="nav-link" href="<?=$homeUrl?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?=activeClass($uri, $newsUrl)?>">
              <a class="nav-link" href="<?=$newsUrl?>"><i class="fas fa-newspaper"></i> お知らせ</a>
            </li>
            <li class="nav-item <?=activeClass($uri, $productUrl)?>">
              <a class="nav-link" href="<?=$productUrl?>"><i class="fas fa-store"></i> オンラインショップ</a>
            </li>
            <li class="nav-item <?=activeClass($uri, $maintenanceUrl)?>">
              <a class="nav-link" href="<?=$maintenanceUrl?>"><i class="fas fa-user-cog"></i> メンテナンス</a>
            </li>
            <li class="nav-item <?=activeClass($uri, $supportUrl)?>">
              <a class="nav-link" href="<?=$supportUrl?>"><i class="fas fa-life-ring"></i> サポート</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none"><a href="#" class="nav-link"><i class="fas fa-life-ring"></i> Help</a></li>
            <li class="nav-item"><a href="<?=site_url('logout')?>" class="nav-link"><i class="fas fa-lock"></i> Logout</a></li>
          </ul>
        </div>
      </nav>
	  <?php else : ?>
      <nav class="navbar navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
          Aqura
        </a>
      </nav>
	  <?php endif; ?>
    </header>
