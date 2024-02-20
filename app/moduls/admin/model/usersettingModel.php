<?php



class usersettingModel extends mainModel{

         public function user_delete($user_id){
                  echo "geldi mi ";

                  $query = $this->db->query("DELETE FROM users WHERE id = '$user_id' ");
                  $query->execute();
    
                  $query2 = $this->db->query("DELETE FROM role_users WHERE user_id = '$user_id' ");
                  $query2->execute();
         }
}

?>