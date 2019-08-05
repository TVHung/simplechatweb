<?php
	App::uses('Model', 'Model');
	class tUser extends AppModel{
		public $useTable = 't_user';
		function checkLogin($email,$password){
	     	$sql = "Select email,password from t_user where email='$email' AND password ='$password'";
	     	$this->query($sql);
	     	if($this->getNumRows()==0){
	       		return false;
		    }else{
		       return true;
		    }
        }
	}
?>