<?php

class loginmodel extends CI_Model{
    public function isvalidate($username, $password){
      $q =  $this -> db -> where(['username' => $username, 'password' => $password])
                        -> get('dabur_users');
                      //  echo '<pre/>';
                       // print_r($q->result());
                        // exit;
                        if($q -> num_rows()){
                            return $q->result();
                         }
                         else{
                             return FALSE;
                         }
    }
    public function usertype($id){
		$q =  $this -> db -> where(['user_type_id' => $id])
			->select('user_type')
			-> get('dabur_usertype');
//		$result = $q[0]->user_type;
//		  echo '<pre/>';
//		 print_r($q->result());
//		 exit;
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
}
?>
