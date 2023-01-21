<?php 

session_start();

include_once '../models/Index.php';

class IndexController extends Index
{

  public function MostarIndex()
  {
    include_once '../views/index/index.php';
  }


}

if(isset($_GET['action']) && $_GET['action'] == 'index'){

  $index = new IndexController();
  $index->MostarIndex();
}

?>