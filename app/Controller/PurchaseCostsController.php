<?php
App::uses('AppController', 'Controller');
/**
 * PurchaseCosts Controller
 *
 * @property PurchaseCost $PurchaseCost
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PurchaseCostsController extends AppController {

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
		$this->PurchaseCost->recursive = 0;
		$this->set('purchaseCosts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PurchaseCost->exists($id)) {
			throw new NotFoundException(__('Invalid purchase cost'));
		}
		$options = array('conditions' => array('PurchaseCost.' . $this->PurchaseCost->primaryKey => $id));
		$this->set('purchaseCost', $this->PurchaseCost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PurchaseCost->create();
			if ($this->PurchaseCost->save($this->request->data)) {
				$this->Flash->success(__('The purchase cost has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase cost could not be saved. Please, try again.'));
			}
		}
		$stores = $this->PurchaseCost->Store->find('list');
		$lookups = $this->PurchaseCost->Lookup->find('list');
		$this->set(compact('stores', 'lookups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PurchaseCost->exists($id)) {
			throw new NotFoundException(__('Invalid purchase cost'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PurchaseCost->save($this->request->data)) {
				$store = $this->PurchaseCost->find('first',array('conditions'=>array('PurchaseCost.id'=>$id,),'recursive'=>-1,));
				$this->Flash->success(__('The purchase cost has been saved.'));
				return $this->redirect(array('controller'=>'stores','action' => 'view',$store['PurchaseCost']['store_id']));
			} else {
				$this->Flash->error(__('The purchase cost could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PurchaseCost.' . $this->PurchaseCost->primaryKey => $id));
			$this->request->data = $this->PurchaseCost->find('first', $options);
		}
		$stores = $this->PurchaseCost->Store->find('list');
		$lookups = $this->PurchaseCost->Lookup->find('list');
		$this->set(compact('stores', 'lookups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PurchaseCost->id = $id;
		if (!$this->PurchaseCost->exists()) {
			throw new NotFoundException(__('Invalid purchase cost'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PurchaseCost->delete()) {
			$this->Flash->success(__('The purchase cost has been deleted.'));
		} else {
			$this->Flash->error(__('The purchase cost could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
