<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?=$config->siteName?> | <?=$page_title;?></title>

		<link rel="shortcut icon" href="<?=$theme_url;?>favicon/favicon.ico" type="image/vnd.microsoft.icon" />

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

		<!-- Theme style -->
		<link rel="stylesheet" href="<?=$theme_url?>css/adminlte.min.css">
		<link rel="stylesheet" href="<?=$theme_url?>css/custom.css">

		<?php 
			\Arifrh\Themes\Themes::renderCSS();
		?>

		<script>
			var site_url   = '<?=site_url()?>';
			var base_url   = '<?=base_url()?>';
			var theme_url  = '<?=$theme_url?>';
			var plugin_url = '<?=$plugin_url?>';
        </script>

	</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  <?php if (session()->getFlashdata('error')) :
		$errors = session()->getFlashdata('error');
		if (! is_array($errors)) :
			$errors = [$errors];
	    endif; ?>
	  	<div class="row">
		  <div class="col s12">
		  <?php foreach ($errors as $error) :
			echo alert('danger', '', $error);
		  endforeach; ?>
		  </div>
		</div>
		<?php endif; ?>
		<?php if (session()->getFlashdata('message')) : ?>
	  	<div class="row">
		  <div class="col s12">
		  <?=alert('success', '', session()->getFlashdata('message'))?>
		  </div>
		</div>
		<?php endif; ?>
		  <?=$content?>
	  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->

	<script src="<?=$plugin_url?>jquery/jquery.min.js"></script>
	<script src="<?=$plugin_url?>bootstrap/js/bootstrap.bundle.min.js"></script>
	<?php 
		\Arifrh\Themes\Themes::renderJS();
	?>

</body>
</html>
