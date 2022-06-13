<?php
namespace App\Controllers;

use Arifrh\DynaModel\DB;

class Home extends PublicController
{
    public function index()
    {
      $this->themes
      ->addJS('')
        ::render('flattern/home', [

      ]);
    }

    public function about()
    {
      $about = DB::table('static_content')->findOneBy(['name'=>'about']);
      $this->themes
      ->addJS('')
        ::render('flattern/about', [
          'about'=>$about
      ]);
    }

    public function services()
    {
      $services = DB::table('static_content')->findOneBy(['name'=>'services']);
      $this->themes
      ->addJS('')
        ::render('flattern/services', [
          'services' => $services
      ]);
    }

    public function faq()
    {
      $faq = DB::table('static_content')->findOneBy(['name'=>'faq']);
      $this->themes
      ->addJS('')
        ::render('flattern/faq', [
          'faq'=>$faq
      ]);
    }

    public function catalogue()
    {
      $this->themes
      ->addJS('')
        ::render('flattern/catalogue', [

      ]);
    }

    public function updates($var='',$id='')
    {

      if($var==''){
        $page='flattern/updates';
      }else if($var=='gallery'){
        if($id==''){
          $page = 'flattern/gallery';
        }else {
          $page = 'flattern/gallery-detail';
        }
      }else if($var=='sale'){
        $page='flattern/sale';
      }else{
        $page='flattern/blog';
      }
      $this->themes
      ->addJS('')
        ::render($page, [

      ]);
    }

    public function contact()
    {
      $this->themes
      ->addJS('')
        ::render('flattern/contact', [

      ]);
    }
}
