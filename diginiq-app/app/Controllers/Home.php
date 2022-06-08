<?php
namespace App\Controllers;

use Arifrh\DynaModel\DB;

class Home extends AdminController
{
    public function index()
    {
		$n = DB::table('news');
		$p = DB::table('products');

        $this->themes::render('home', [
			'news'     => $n->orderBy('published_at', 'desc')->findAll(),
			'products' => $p->orderBy('created_at', 'desc')->findAll(),
		]);
    }
}
