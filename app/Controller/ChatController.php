<?php 
App::uses('AppController', 'Controller');
class ChatController extends AppController {
	public $uses = array('tFeed');
	//function main show data
	function feed() {
		if ($this->request->is('post')) {
			$this->tFeed->create();
			$creatAt = date('Y-m-d H:i:s');
			$this->request->data['create_at'] = $creatAt;

			if ($this->tFeed->save($this->request->data)) {
				$this->Session->setFlash(__('Success'));
			} else {
				$this->Session->setFlash(__('Failure'));
			}
		}
		$feeds = $this->tFeed->find('all', array("tFeed.id" => "DESC"));
		$this->set('feeds', $feeds);
	}

	function edit($id) {
		if($this->request->is('post')){
			$this->tFeed->read(null, $id);//tro den ban ghi co id
			$this->tFeed->set(array(
				'name' => $this->request->data('name'),
				'message' => $this->request->data('message'),
				'update_at' => date('Y-m-d H:i:s')
			));
			$this->tFeed->save();
			$this->redirect('feed');
		}
		$feeds = $this->tFeed->findById($id);
		$this->set('feeds', $feeds);
	}

	function delete($id) {
		$this->autoRender = false;
		$this->tFeed->delete($id);
		$this->redirect('feed');
	}
}