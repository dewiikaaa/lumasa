<?php
namespace App\Controllers;

class Support extends AdminController
{
    public function index()
    {
        $this->themes::render('support');
    }
}
