<?php

namespace App\Database\Migrations;

class InitialTables extends \CodeIgniter\Database\Migration
{
	/**
	 * Table attributes
	 *
	 * @var mixed $attributes
	 */
	protected $attributes = ['ENGINE' => 'InnoDB'];

	/**
	 * Create Table if Not Exists ?
	 *
	 * @var boolean $ifNotExists
	 */
	protected $ifNotExists = true;

	protected $sqlViews = [];
	protected $sqlFiles = [
		'news',
		'news_read',
		'news_deleted',
		'products',
	];

	/**
	 * Run Migragtion
	 *
	 * @return void
	 */
	public function up()
	{
		$this->runSqlFiles();
	}

	protected function runSqlFiles()
	{
		foreach ($this->sqlFiles as $file)
		{
			$sql = file_get_contents(WRITEPATH . 'sql/' . $file . '.sql');

			$this->db->query($sql);
		}
	}

	protected function dropViews()
	{
		foreach ($this->sqlViews as $view)
		{
			$this->db->query('DROP VIEW IF EXISTS ' . $view);
		}
	}

	/**
	 * Rollback Migration
	 *
	 * @return void
	 */
	public function down()
	{

	}
}