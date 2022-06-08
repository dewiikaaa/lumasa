<?php
namespace App\Controllers;

use Arifrh\DynaModel\DB;

class News extends AdminController
{
    public function index()
    {
		$n = DB::table('news');

		if ($posts = $this->request->getPost())
		{
			if (! empty($posts['id']))
			{
				$n->update($posts['id'], $posts);
			}
			else
			{
				unset($posts['id']);
				$n->insert(array_merge($posts, [
					'created_at'   => date('Y-m-d'),
					'published_at' => date('Y-m-d'),
					'publish'      => 1,
				]));
			}
		}

        $this->themes
			->loadPlugins('bootbox')
			->addJS('news')
			::render('news', [
				'news'     => $n->orderBy('published_at', 'desc')->findAll(),
			]);
    }

	public function delete()
	{
		$success = false;

		if ($id = $this->request->getPost('id'))
		{
			$n = DB::table('news');

			$success = $n->delete($id);
		}

		return $this->response->setJSON(['success' => $success]);
	}
}
