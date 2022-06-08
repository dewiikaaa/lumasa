<?php
namespace App\Controllers;

use CodeIgniter\Config\Config;

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
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		if (! $this->auth->isLogged())
		{
			redirect()->to('/login')->send();
			exit;
		}

		$this->auth->requiredGroups(['Super Admin', 'Admin']);
	}
}
