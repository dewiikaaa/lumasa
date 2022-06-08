<?php
namespace App\Controllers;

use Arifrh\DynaModel\DB;

class Maintenance extends AdminController
{
    public function index()
    {
        $this->themes::render('maintenance');
    }
}
