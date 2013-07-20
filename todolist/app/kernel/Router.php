<?php

class Router {
   public static function analyze( $query ) {
      $result = array(
         "controller" => "Error",
         "action" => "error404",
         "params" => array()
      );

      if( $query === "" || $query === "/" ) {
         $result["controller"] = "Index";
         $result["action"] = "display";
      } else {
         $parts = explode("/", $query);
         if($parts[0] == "item" && count($parts) == 2) {
            $result["controller"] = "Item";
            $result["action"] = "display";
            $result["params"]["slug"] = $parts[1];            
         }
      }
      return $result;

   }

}
