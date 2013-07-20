<?php

class IndexController extends Controller {
   
   public function display() {
      $this->view->list = Item::getList();
      $this->view->display();
   }

}
