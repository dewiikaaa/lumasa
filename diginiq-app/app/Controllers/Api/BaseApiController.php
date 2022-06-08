<?php namespace App\Controllers\Api;

use Arifrh\DynaModel\Controllers\ApiController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Base Api Controller
 */
class BaseApiController extends ApiController
{
	/**
	 * Table name
	 * @var string $modelName
	 */
	protected $modelName = '';

	/**
	 * Table for image path
	 * @var string $imageTableName
	 */
	protected $imageTableName = '';

	/**
	 * Image Path
	 * @var string $imagePath
	 */
	protected $imagePath = 'uploads/files/';

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$allowed_headers = ['Origin', 'X-Requested-With', 'Content-Type', 'Accept', 'Access-Control-Request-Method'];
        $allowed_methods = ['GET', 'POST', 'OPTIONS', 'PUT', 'PATCH', 'DELETE', 'HEAD'];

		$this->response->setHeader('Access-Control-Allow-Origin', '*');
		$this->response->setHeader('Access-Control-Allow-Headers', implode(', ',  $allowed_headers));
		$this->response->setHeader('Access-Control-Allow-Methods', implode(', ',  $allowed_methods));
	}

	/**
	 * Display All data
	 *
	 * @return json
	 */
	public function index()
	{
		$allData = $this->model->setOrderBy([
			'display_order' => 'asc',
		])->find();

		return $this->getRespondTotal($allData);
	}

	/**
	 * Display one data based on ID
	 *
	 * @param int $id
	 *
	 * @return json
	 */
	public function show($id = NULL)
	{
		$data = $this->model->findOneBy(['id' => $id]);

		return $this->getRespondSingle($data);
	}

	/**
	 * Create/Insert new data
	 *
	 * @return json
	 */
	public function create()
	{
		$posts = $this->request->getPost();

		if ($posts)
		{
			$id = $this->model->insert($posts);
			return $this->respondCreated($this->model->find($id));
		}

		return $this->fail(lang('Core.message.insert_failed'));
	}

	/**
	 * Update data based on ID
	 *
	 * @param int $id
	 *
	 * @return json
	 */
	public function update($id = NULL)
	{
		$posts = $this->request->getPost();

		if ($posts)
		{
			$this->model->update($id, $posts);
			return $this->respondUpdated($this->model->find($id));
		}

		return $this->fail(lang('Core.message.update_failed'));
	}

	/**
	 * Unify json return format from result
	 *
	 * @return json
	 */
	protected function getRespondTotal($result, $extraResult = [])
	{
		return $this->respond(array_merge([
			'status'     => 200,
			'total'      => is_array($result) ? count($result) : 0,
			'data'       => $result,
			'image_path' => rtrim(base_url($this->imagePath), '/') . '/',
		], $extraResult));
	}

	/**
	 * Unify json return format for single result
	 *
	 * @return json
	 */
	protected function getRespondSingle($result, $extraResult = [])
	{
		if ($result)
		{
			$return = [
				'status'     => 200,
				'data'       => $result,
				'image_path' => rtrim(base_url($this->imagePath), '/') . '/',
			];

			return $this->respond(array_merge($return, $extraResult));
		}

		return $this->failNotFound(lang('not_found'));
	}

	protected function changeModel($tableName)
	{
		$model = \Arifrh\DynaModel\DB::table($tableName);

		$this->setModel($model);
	}
}