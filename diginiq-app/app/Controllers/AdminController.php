<?php
namespace App\Controllers;

use \Arifrh\DynaModel\DB;

/**
 * Class ProtectedController
 *
 * ProtectedController provides a secure pages
 * only logged in users can access it.
 *
 * Extend this class in any new controllers:
 *     class Admin extends ProtectedController
 *
 * @package Auth
 */

class AdminController extends ProtectedController
{
	protected $helpers = ['bootstrap', 'cookie', 'form'];

	protected $user;

	protected $crud;

	protected $filePath = 'uploads/files/';

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$this->auth->requiredRoles(['Administrator']);

		$topNavMenus = [
			[
				'text'   => 'Home',
				'url'    => site_url('admin'),
				'active' => false
			],
		];



		$sidebarMenus = [
			[
				'text'      => 'お困りごと',
				'url'       => site_url('admin/customerService'),
				'icon'      => 'fas fa-tachometer-alt',
				'active'    => true,
				'open'      => false,
				'selected'  => false,
				'has_sub'   => true,
				'subs'      => [
					[
						'text'      => 'アンケート作成',
						'url'       => site_url('admin/customerService/newSurvey'),
						'icon'      => 'fas fa-tags',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
					[
						'text'      => 'アンケート回答',
						'url'       => site_url('admin/customerService/surveyAnswer'),
						'icon'      => 'fas fa-tags',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
						'badge'     => [
							'type' => 'danger',
							'text' => '', // change this to number of un read answer
						],
					],
					[
						'text'      => 'お困りごと',
						'url'       => site_url('admin/customerService/inquiry'),
						'icon'      => 'fas fa-tags',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
						'badge'     => [
							'type' => 'danger',
							'text' => '', // change this to number badge
						],
					],
				],
				'has_badge' => false,
			],
			[
				'text'      => 'ユーザー',
				'url'       => site_url('admin/users'),
				'icon'      => 'fas fa-users',
				'active'    => true,
				'open'      => false,
				'selected'  => false,
				'has_sub'   => false,
				'subs'      => [],
				'has_badge' => false,
			],
			[
				'text'      => '製品',
				'url'       => site_url('admin/products'),
				'icon'      => 'fas fa-book',
				'active'    => true,
				'open'      => false,
				'selected'  => false,
				'has_sub'   => true,
				'subs'      => $categoryMenu,
				'has_badge' => false,
			],
			[
				'text'      => '格納前点検',
				'url'       => site_url('admin/maintenance'),
				'icon'      => 'fas fa-cog',
				'active'    => true,
				'open'      => false,
				'selected'  => false,
				'has_sub'   => true,
				'subs'      => [
					[
						'text'      => '説明',
						'url'       => site_url('admin/maintenance/desc'),
						'icon'      => 'fas fa-tags',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
					[
						'text'      => 'Q&A',
						'url'       => site_url('admin/maintenance/qna'),
						'icon'      => 'fas fa-question-circle',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
					[
						'text'      => '詳細情報',
						'url'       => site_url('admin/maintenance/info'),
						'icon'      => 'fas fa-globe',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
				],
				'has_badge' => false,
			],
			[
				'text'      => '日常点検整備',
				'url'       => site_url('admin/dailyMaintenance'),
				'icon'      => 'fas fa-calendar',
				'active'    => true,
				'open'      => false,
				'selected'  => false,
				'has_sub'   => true,
				'subs'      => [
					[
						'text'      => '説明',
						'url'       => site_url('admin/dailyMaintenance/desc'),
						'icon'      => 'fas fa-tags',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
					[
						//'text'      => '日常点検整備',
						'text'				=> 'Q&A',
						'url'       => site_url('admin/dailyMaintenance/qna/1'),
						'icon'      => 'fas fa-question-circle',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],


					[
						'text'      => '不調診断',
						'url'       => site_url('admin/dailyMaintenance/qna/2'),
						'icon'      => 'fas fa-question-circle',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],

					[
						'text'      => '詳細情報',
						'url'       => site_url('admin/dailyMaintenance/info'),
						'icon'      => 'fas fa-globe',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
				],
				'has_badge' => false,
			],
			[
				'text'      => 'シーズン前点検',
				'url'       => site_url('admin/seasonMaintenance'),
				'icon'      => 'fas fa-cogs',
				'active'    => true,
				'open'      => false,
				'selected'  => false,
				'has_sub'   => true,
				'subs'      => [
					[
						'text'      => '説明',
						'url'       => site_url('admin/seasonMaintenance/desc'),
						'icon'      => 'fas fa-tags',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
					[
						'text'      => 'Q&A',
						'url'       => site_url('admin/seasonMaintenance/qna'),
						'icon'      => 'fas fa-question-circle',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
					[
						'text'      => '詳細情報',
						'url'       => site_url('admin/seasonMaintenance/info'),
						'icon'      => 'fas fa-globe',
						'active'    => true,
						'open'      => false,
						'selected'  => false,
						'has_sub'   => false,
						'subs'      => [],
						'has_badge' => false,
					],
				],
				'has_badge' => false,
			],
		];

	
		$config = config('AdminLTE');

		$this->themes = \Arifrh\Themes\Themes::init($config);

		$this->themes
			->useFullTemplate()
			->setTemplate('admin')
			->loadPlugins('fa-free')
			->addJS('adminlte.min.js')
			->setVar([
				'topNavMenus'    => $this->setTopNavMenus($topNavMenus),
				'controlSidebar' => $this->setControlSidebar(),
				'sidebarMenus'   => $this->setSidebarMenu($sidebarMenus),
				'user'           => $this->user,
				'config'         => $this->config,
				'filePath'       => $this->filePath,
			]);
	}

	protected function setTopNavMenus($menus = [])
	{
		$menuHTML = '';

		foreach ($menus as $menu)
		{
			if ($menu['active'])
			{
				$menuHTML .= '<li class="nav-item d-none d-sm-inline-block">
					<a href="' . $menu['url'] . '" class="nav-link">' . $menu['text'] . '</a>
				</li>';
			}
		}

		return $menuHTML;
	}

	/**
	 * HTML template for search form
	 */
	protected function setSearchForm()
	{
		return '<!-- SEARCH FORM -->
		<form class="form-inline ml-3">
		  <div class="input-group input-group-sm">
			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
			<div class="input-group-append">
			  <button class="btn btn-navbar" type="submit">
				<i class="fas fa-search"></i>
			  </button>
			</div>
		  </div>
		</form>';
	}

	/**
	 * HTML template for Message Notif
	 */
	protected function setMessageNotif()
	{
		return '<!-- Messages Dropdown Menu -->
		<li class="nav-item dropdown">
		  <a class="nav-link" data-toggle="dropdown" href="#">
			<i class="far fa-comments"></i>
			<span class="badge badge-danger navbar-badge">3</span>
		  </a>
		  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<a href="#" class="dropdown-item">
			  <!-- Message Start -->
			  <div class="media">
				<img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
				<div class="media-body">
				  <h3 class="dropdown-item-title">
					Brad Diesel
					<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
				  </h3>
				  <p class="text-sm">Call me whenever you can...</p>
				  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
				</div>
			  </div>
			  <!-- Message End -->
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">
			  <!-- Message Start -->
			  <div class="media">
				<img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
				<div class="media-body">
				  <h3 class="dropdown-item-title">
					John Pierce
					<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
				  </h3>
				  <p class="text-sm">I got your message bro</p>
				  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
				</div>
			  </div>
			  <!-- Message End -->
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">
			  <!-- Message Start -->
			  <div class="media">
				<img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
				<div class="media-body">
				  <h3 class="dropdown-item-title">
					Nora Silvester
					<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
				  </h3>
				  <p class="text-sm">The subject goes here</p>
				  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
				</div>
			  </div>
			  <!-- Message End -->
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
		  </div>
		</li>';
	}

	/**
	 * HTML template for Push Notif
	 */
	protected function setPushNotif()
	{
		return '<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown">
		  <a class="nav-link" data-toggle="dropdown" href="#">
			<i class="far fa-bell"></i>
			<span class="badge badge-warning navbar-badge">15</span>
		  </a>
		  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<span class="dropdown-item dropdown-header">15 Notifications</span>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">
			  <i class="fas fa-envelope mr-2"></i> 4 new messages
			  <span class="float-right text-muted text-sm">3 mins</span>
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">
			  <i class="fas fa-users mr-2"></i> 8 friend requests
			  <span class="float-right text-muted text-sm">12 hours</span>
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">
			  <i class="fas fa-file mr-2"></i> 3 new reports
			  <span class="float-right text-muted text-sm">2 days</span>
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
		  </div>
		</li>';
	}

	protected function setControlSidebar()
	{
		return '<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
		  <!-- Control sidebar content goes here -->
		  <div class="p-3">
			<h5>' . $this->user['fullname'] . '</h5>
			<p>
				<ul class="list-unstyled">
					<!--li><a href="' . site_url('admin/profil') . '">Profil</a></li-->
					<li><a href="' . site_url('logout') . '">Logout</a></li>
				</ul>
			</p>
		  </div>
		</aside>
		<!-- /.control-sidebar -->';
	}

	/**
	 * HTML template for User Panel sidebar
	 */
	protected function setUserPanel()
	{
		return '<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		  <div class="image">
			<img src="user-pic.jpg" class="img-circle elevation-2" alt="User Image">
		  </div>
		  <div class="info">
			<a href="#" class="d-block">Alexander Pierce</a>
		  </div>
		</div>';
	}

	protected function setSearchMenu()
	{
		return '<!-- SidebarSearch Form -->
		<div class="form-inline mt-2">
		  <div class="input-group" data-widget="sidebar-search">
			<input class="form-control form-control-sidebar" name="searchMenu" type="search" placeholder="Search" aria-label="Search">
			<div class="input-group-append">
			  <button class="btn btn-sidebar">
				<i class="fas fa-search fa-fw"></i>
			  </button>
			</div>
		  </div>
		</div>';
	}

	protected function setSidebarMenu($menus = [])
	{
		$currentUrl = current_url();

		$currentUrl = str_replace("contents/post","contents/title",$currentUrl);

		$menuHTML   = '';

		foreach ($menus as $menu)
		{
			if ($menu['active'])
			{
				$menu['selected'] = ($currentUrl == $menu['url'] || stripos($currentUrl, $menu['url']) > -1);
				$menuHTML .= '<li class="nav-item' . ($menu['open'] || $menu['selected'] ? ' menu-open' : '') . '">';

				if ($menu['has_sub'])
				{
					$menuHTML .= '<a href="#" class="nav-link' . ($menu['selected'] ? ' active' : '') . '">
						<i class="nav-icon ' . $menu['icon'] . '"></i>
						<p>' .	$menu['text'] .
						  '<i class="right fas fa-angle-left"></i>
						</p>
					  </a>
					  <ul class="nav nav-treeview">';

					foreach ($menu['subs'] as $subMenu)
					{
						$subMenu['selected'] = ($currentUrl == $subMenu['url'] || stripos($currentUrl, $subMenu['url']) > -1);
						$menuHTML .= '<li class="nav-item ml-4 ' . ($subMenu['open'] ? ' menu-open' : '') . '">
							<a href="' . $subMenu['url'] . '" class="nav-link' . ($subMenu['selected'] ? ' active' : '') . '">
				              <i class="nav-icon ' . $subMenu['icon'] . '"></i>
				              <p>' .
								$subMenu['text'] .
								($subMenu['has_badge'] ? '<span class="right badge badge-' . $subMenu['badge']['type'] . '">' . $subMenu['badge']['text'] . '</span>' : '') .
				              '</p>
							</a>
						</li>';
					}

            		$menuHTML .= '</ul>';
				}
				else
				{
					$menuHTML .= '<a href="' . $menu['url'] . '" class="nav-link' . ($menu['selected'] ? ' active' : '') . '">
		              <i class="nav-icon ' . $menu['icon'] . '"></i>
		              <p>' .
						$menu['text'] .
						($menu['has_badge'] ? '<span class="right badge badge-' . $menu['badge']['type'] . '">' . $menu['badge']['text'] . '</span>' : '') .
		              '</p>
					</a>';
				}

				$menuHTML .= '</li>';
			}
		}

		return $menuHTML;
	}

	protected function setBreadcrumbs($links = [])
	{
		$breadcrumbs = '';
		foreach ($links as $i => $link)
		{
			if (count($links) == ($i+1))
			{
				$breadcrumbs .= '<li class="breadcrumb-item active">' . $link['text'] . '</li>';
			}
			else
			{
				$breadcrumbs .= '<li class="breadcrumb-item active"><a href="' . site_url($link['url']) . '">' . $link['text'] . '</a></li>';
			}
		}

		return '<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="' . site_url('admin') . '">Home</a></li>' .
              $breadcrumbs . '
            </ol>
          </div><!-- /.col -->';
	}

	public function notFound()
	{
		$this->themes::render('page/404');
	}
}
