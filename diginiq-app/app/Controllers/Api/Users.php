<?php namespace App\Controllers\Api;
use Arifrh\Auth\Auth;


/**
 * Api for Users 
 */
class Users extends BaseApiController
{
	/**
	 * Auth Object
	 *
	 * @var stdClass
	 */
	public $auth = null;

	/**
	 * Table name
	 * @var string $modelName
	 */
	protected $modelName = 'users';


	/**
	 * Display All data
	 *
	 * @return json
	 */
	public function index()
	{
		$allData = $this->model->find();

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
		$data = $this->model
			->findOneBy(['id' => $id]);
		$filepath = $this->setFilePath('users');
		return $this->getRespondSingle(array_merge($data,['file_path' => $filepath]));
	}

	public function register()
	{
		$posts = $this->request->getPost();
		if ($posts)
		{
			$exist = $this->model->findOneBy(['email'=>$posts['email']]);
			if(!$exist){
				$exist = $this->model->findOneBy(['username'=>$posts['username']]);
			}else{
				$return['error'] = true;
				$return['message'] = "Email already registered";
				return $this->respond($return);
			}

			if($exist){
				$return['error'] = true;
				$return['message'] = "Username already registered";
				return $this->respond($return);
			}

			$this->auth = new Auth();
			$password = $posts['password'];
			if(!empty($password)){
				$posts['password'] = $this->auth->getHash($password);
			}
			$id = $this->model->insert($posts);
			$data = $this->model->find($id);
			$data['password'] = $password;
			$return['data'] = $data;
			$return['error'] = false;
			$return['message'] = "Data saved";
			
		}else{
			$return['error'] = true;
			$return['message'] = "There is no data";
		}

		return $this->respondCreated($return);

	}

	public function login(){
		$posts = $this->request->getPost();
		if ($posts)
		{
			$this->auth = new Auth();
			$return['data'] = $this->model->findOneBy(['username'=>$posts['username']]);
			if($return['data']){
				if($this->auth->passwordVerifyWithRehash($posts['password'],$return['data']['password'],0)){
					$return['password_match']= true;
					$return['error'] = false;
					$return['message'] = 'Login success';
					unset($return['data']['password']);
				}else{
					$return['error'] = true;
					$return['message'] = 'Password unmatch!';
				}
			}else{
				$return['error'] = true;
				$return['message'] = 'Username not found!';
			}
		}else{
			$return['error'] = true;
			$return['message'] = 'No data login';
		}
		
		return $this->respond($return);
	}
}