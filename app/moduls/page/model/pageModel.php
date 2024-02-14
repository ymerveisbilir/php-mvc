<?php

class pageModel extends mainModel{
         public function languages(){
                  $stmt = $this->db->query("SELECT * FROM languages");
                  return $stmt;
         }
     
}

?>