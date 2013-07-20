<?php

class ItemController extends Controller {
   public function display() {
      $slug = $this->route["params"]["slug"];
      $this->view->item = Item::getFromSlug($slug);
      $this->view->display();
   }

}
