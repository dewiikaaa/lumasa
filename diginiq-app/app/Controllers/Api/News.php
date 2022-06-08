<?php namespace App\Controllers\Api;

/**
 * Api for News
 */
class News extends BaseApiController
{
	/**
	 * Table name
	 * @var string $modelName
	 */
	protected $modelName = 'news';

	/**
	 * Table for news read
	 * @var string $readNewsTable
	 */
	protected $readNewsTable = 'news_read';

	/**
	 * Table for news deleted
	 * @var string $deletedNewsTable
	 */
	protected $deletedNewsTable = 'news_deleted';

	/**
	 * Display All data
	 *
	 * @return json
	 */
	public function index()
	{
		$userId = $this->request->getPost('user_id');

		$deletedNews = [];

		if (! empty($userId))
		{
			$this->changeModel($this->deletedNewsTable);

			$deleted = $this->model->findBy(['user_id' => $userId]);

			if (is_array($deleted))
			{
				$deletedNews = array_key_value($deleted, ['news_id' => 'news_id']);
			}
		}

		$this->changeModel('news');

		if (! empty($deletedNews))
		{
			$this->model->builder->whereNotIn('news.id', $deletedNews);
		}
		if (! empty($userId))
		{
			$this->model->select('news.*, nr.id as read');
			$this->model->join('news_read nr', 'news.id = nr.news_id and nr.user_id='.$userId,'left');
		}
		$allData = $this->model->setOrderBy([
			'published_at' => 'desc',
			'sort_order'   => 'asc',
		])->findBy([
			'publish' => 1,
		]);


		return $this->getRespondTotal($allData);
	}

	/**
	 * Read News
	 *
	 * @param int $id        news id
	 * @param int $userId
	 *
	 * @return json
	 */
	public function readBy($id = NULL, $userId = NULL)
	{
		$data = $this->model->findOneBy(['id' => $id]);

		$this->changeModel($this->readNewsTable);

		$readData = [
			'news_id' => $id,
			'user_id' => $userId,
		];

		$exist = $this->model->findBy($readData);

		if (! $exist)
		{
			$this->model->insert($readData);
		}

		return $this->getRespondSingle(array_merge($data, ['file_path' => FCPATH . $this->imagePath]));
	}

	/**
	 * Delete News from list
	 *
	 * @param int $id        news id
	 * @param int $userId
	 *
	 * @return json
	 */
	public function deleteBy($id = NULL, $userId = NULL)
	{
		$data = $this->model->findOneBy(['id' => $id]);

		$this->changeModel($this->deletedNewsTable);

		$deleteData = [
			'news_id' => $id,
			'user_id' => $userId,
		];

		$exist = $this->model->findBy($deleteData);

		if (! $exist)
		{
			$this->model->insert($deleteData);
		}

		return $this->getRespondSingle(array_merge($data, ['file_path' => FCPATH . $this->imagePath]));
	}
}