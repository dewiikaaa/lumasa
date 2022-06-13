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

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?=$topNavMenus?>
      </li>
    </ul>

    <?=$searchForm??''?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?=$messageNotif??''?>
      <?=$pushNotif??''?>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="<?=site_url('admin')?>" class="brand-link navbar-white">
      <img src="<?=$theme_url?>img/logo.png" alt="<?=$config->siteName?>" class="brand-image elevation-3" style="height:100%; width:auto">
      <span class="brand-text font-weight-bold logo-text"><?=$config->siteName?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
	  
		<?=$userPanel??''?>
		<?=$searchMenu??''?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <?=$sidebarMenus??''?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <?=$breadcrumbs??''?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; <?=$config->siteName?> </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
		Themes By <a href="https://adminlte.io">AdminLTE.io</a>.<b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <?=$controlSidebar??''?>
</div>
<!-- ./wrapper -->

	<script src="<?=$plugin_url?>jquery/jquery.min.js"></script>
	<script src="<?=$plugin_url?>bootstrap/js/bootstrap.bundle.min.js"></script>
	<?php 
		\Arifrh\Themes\Themes::renderJS();
	?>

</body>
</html>
