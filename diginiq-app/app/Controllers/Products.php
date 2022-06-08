<?php
namespace App\Controllers;

use Arifrh\DynaModel\DB;

class Products extends AdminController
{
    public function index()
    {
		$p = DB::table('products');

		if ($posts = $this->request->getPost())
		{
			if ($file = $this->request->getFile('picture'))
			{
				if ($file->isValid() && ! $file->hasMoved())
				{
					if ($file->move(FCPATH . 'uploads/files'))
					{
						$posts['picture'] = $file->getName();
					}
				}
			}
			else
			{
				if (isset($posts['picture']))
				{
					unset($posts['picture']);
				}
			}

			if (! empty($posts['id']))
			{
				$p->update($posts['id'], $posts);
			}
			else
			{
				unset($posts['id']);
				$p->insert(array_merge($posts, [
					'created_at'   => date('Y-m-d'),
					'publish'      => 1,
				]));
			}
		}

        $this->themes
			->loadPlugins('bootbox')
			->addJS('bootstrap-filestyle.min.js, products.js')
			::render('products', [
				'products' => $p->orderBy('created_at', 'desc')->findAll(),
			]);
    }

	public function delete()
	{
		$success = false;

		if ($id = $this->request->getPost('id'))
		{
			$p = DB::table('products');

			$success = $p->delete($id);
		}

		return $this->response->setJSON(['success' => $success]);
	}
}
