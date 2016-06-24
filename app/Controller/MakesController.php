<?php
App::uses('AppController', 'Controller');
/**
 * Makes Controller
 *
 * @property Make $Make
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class MakesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Make->recursive = 0;
		$this->set('makes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Make->exists($id)) {
			throw new NotFoundException(__('Invalid make'));
		}
		$options = array('conditions' => array('Make.' . $this->Make->primaryKey => $id));
		$this->set('make', $this->Make->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Make->create();
			if ($this->Make->save($this->request->data)) {
				$this->Flash->success(__('The make has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The make could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Make->exists($id)) {
			throw new NotFoundException(__('Invalid make'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Make->save($this->request->data)) {
				$this->Flash->success(__('The make has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The make could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Make.' . $this->Make->primaryKey => $id));
			$this->request->data = $this->Make->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Make->id = $id;
		if (!$this->Make->exists()) {
			throw new NotFoundException(__('Invalid make'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Make->delete()) {
			$this->Flash->success(__('The make has been deleted.'));
		} else {
			$this->Flash->error(__('The make could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function getModel($makeId = null) {

		if($this->request->is('ajax')) {
			Configure::write('debug', 0);


	        $this->layout=null;
	        $list = $this->Make->Mod->find('list',array('conditions'=>array('make_id'=>$makeId)));
	        echo json_encode($list);
	        exit;
	        // What else?

	    }
	}
}
