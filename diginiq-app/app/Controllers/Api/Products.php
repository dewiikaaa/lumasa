<?php namespace App\Controllers\Api;

/**
 * Api for Products
 */
class Products extends BaseApiController
{
	/**
	 * Table name
	 * @var string $modelName
	 */
	protected $modelName = 'products';

	/**
	 * Table for carts
	 * @var string $cartTable
	 */
	protected $cartTable = 'carts';

	/**
	 * Table for orders
	 * @var string $orderTable
	 */
	protected $orderTable = 'orders';

	/**
	 * Display All data
	 *
	 * @return json
	 */
	public function index()
	{
		$allData = $this->model->setOrderBy([
			'sort_order' => 'asc',
			'created_at' => 'desc',
		])->findBy([
			'publish' => 1,
		]);

		return $this->getRespondTotal($allData);
	}

	/**
	 * Adding Cart
	 *
	 * @return json
	 */
	public function addToCart()
	{
		$posts = $this->request->getPost();

		$this->changeModel($this->cartTable);

		$cartData = [
			'product_id' => $posts['product_id'],
			'user_id'    => $posts['user_id'],
		];

		$exist = $this->model->findBy($cartData);

		if (! $exist)
		{
			$this->model->insert(array_merge($cartData, [
				'qty' => $posts['qty'],
			]));
		}
		else
		{
			$this->model->updateBy([
				'qty' => $posts['qty'],
			], $cartData);
		}

		$data = $this->model->findBy($cartData);

		return $this->getRespondSingle(array_merge($data, ['file_path' => FCPATH . $this->imagePath]));
	}

	/**
	 * Display user carts
	 *
	 * @return json
	 */
	public function carts()
	{
		$userId = $this->request->getPost('user_id');

		$this->changeModel($this->cartTable);

		$this->model
			->select('carts.*, p.name, p.description, p.price, p.picture', false)
			->join('products p', 'carts.product_id = p.id');

		$allData = $this->model->setOrderBy([
			'product_id' => 'asc',
		])->findBy([
			'user_id' => $userId,
		]);

		return $this->getRespondTotal($allData);
	}

	/**
	 * Buy Products
	 *
	 * @return json
	 */
	public function buy()
	{
		$userId = $this->request->getPost('user_id');

		$this->changeModel($this->cartTable);

		$this->model
			->select('carts.*, p.name, p.description, p.price, p.picture', false)
			->join('products p', 'carts.product_id = p.id');

		$allCarts = $this->model->setOrderBy([
			'product_id' => 'asc',
		])->findBy([
			'user_id' => $userId,
		]);

		$newOrders = [];

		foreach ($allCarts as $cart)
		{
			$newOrders[] = [
				'user_id'    => $userId,
				'product_id' => $cart['product_id'],
				'qty'        => $cart['qty'],
				'price'      => $cart['price'],
				'purchase_date' => date('Y-m-d'),
			];
		}

		$this->changeModel($this->orderTable);

		$this->model->insertBatch($newOrders);

		$this->changeModel($this->cartTable);

		$this->model->deleteBy(['user_id' => $userId]);

		return $this->getRespondSingle($newOrders);
	}

	public function emptyCart()
	{
		$data = [];
		$userId = $this->request->getPost('user_id');
		$this->changeModel($this->cartTable);	
		$this->model->deleteBy(['user_id' => $userId]);
		return $this->getRespondTotal($data);
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