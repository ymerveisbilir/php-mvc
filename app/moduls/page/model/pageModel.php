<?php

class pageModel extends mainModel{

         public function pages(){
                  $stmt = $this->db->query("SELECT * FROM pages");
                  return $stmt;
         }
         public function languages(){
                  $stmt = $this->db->query("SELECT * FROM languages");
                  return $stmt;
         }
     
}

?>