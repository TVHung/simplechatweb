<?php 
App::uses('AppController', 'Controller');
class UserController extends AppController {
	public $uses = array('tUser');
	var $helpers = array("Html");
    var $component = array("Session");

	public function regist() 
	{
		if ($this->request->is('post')) 
		{
			$this->tUser->create();
			$new_user = $this->tUser->set
			(
				array
				(
					'name' => $this->request->data('name'),
					'email' => $this->request->data('email'),
					'password' => ($this->request->data('password'))
			 	)
			);

			if ($this->tUser->save($new_user))
			{
				$this->Session->setFlash(__('Success'));
				$this->redirect("login");
			} 
			else 
			{
				$this->Session->setFlash(__('Failure'));
			}
		}
		$users = $this->tUser->find('all');
		$this->set('users', $users);
	}

	public function login() {
		if ($this->request->is('post')) 
		{
			$email = $this->request->data('email');
			$password = $this->request->data('password');

			$error="";
	     	if (isset($_POST['ok']))
	     	{
		        $this->tUser->set
		        (
					array
					(
						'email' => $this->request->data('email'),
						'password' => ($this->request->data('password'))
					)
				);
				$this->tUser->save();
		    }
	        if ($this->tUser->checkLogin($email,$password)) 
	        {
	        	$user = $this->tUser->find("first", array(
	        		'conditions' => array('tUser.email' => $email)
	        	));
	        	$name = $user['tUser']['name'];
	        	$this->Session->write("name",$name);
		        $this->Session->write("session",$email); //ghi session
		        $this->redirect("/Chat/feed");//đăng nhập thành công chuyển trang thông tin
	        }
	        else 
	        {
	        	$this->Session->setFlash(__('Tên đăng nhập hoặc mật khẩu không đúng!'));
	        }
		}
	}

	public function logout()
	{
    	$this->Session->delete('session'); //xóa session
      	$this->redirect("login"); //chuyển trang login
    }	
}
