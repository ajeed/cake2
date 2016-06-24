<?php
App::uses('AppController', 'Controller','TimeHelper');
/**
 * Stores Controller
 *
 * @property Store $Store
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class StoresController extends AppController {

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
	


	    $conditions = array();

	    if(!empty($this->request->query)) {

	       	switch ($this->request->query['status']) {
	    	case '1':
	    		$conditions['Store.in_store'] = 1;
	    		break;

	    	case '0':
	    		$conditions['Store.in_store'] = 0;
	    		break;
	    	
	    	default:
	    		break;
	   	 	}

		    if($this->request->query['incompleteDoc'] === 'on') 
		    	$conditions['OR'] = array(
		    		'Document.grant_ori'=>0,
						'Document.seller_ic'=>0,
						'Document.auth_letter'=>0,
						'Document.stms'=>0,
						);

		    if($this->request->query['underFinance'] === 'on')
		    	$conditions['Store.under_finance'] = 1;

		    if(!(empty($this->request->query['pdtFrom']) && empty($this->request->query['pdtTo']))) {
		    	$dtFrom = DateTime::createFromFormat('d/m/Y',$this->request->query['pdtFrom']);
		    	$dtTo = DateTime::createFromFormat('d/m/Y',$this->request->query['pdtTo']);
		    	$conditions[0] = array(
		    		'Store.date BETWEEN ? AND ?' => array(
		    			$dtFrom->format('Y-m-d'),$dtTo->format('Y-m-d'))
		    		);
		    }

		    $this->set('data',$this->request->query);
	    }

	    //When there is no $this->data, set default as available.
	    else { 
		    	$conditions['Store.in_store'] = 1;
		}


	    // pr($this->Store->find('all',array('conditions'=>$conditions)));exit;

		//Get List of Pending Documents
		$this->set('pendingDocs',$this->Store->getDocPending());

		//Get List of under finance
		$this->set('underFinance',$this->Store->getUnderFinance());


		$this->Store->recursive = 0;
		$this->paginate = array('order'=>'Store.date DESC');
		$this->set('stores', $this->paginate(null,$conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		$store = $this->Store->read(null, $id);
		$store['Document'] = $this->checkDocument($id);
		$this->set('store', $store);
		$this->Store->Sale->recursive = 0;
		$sale = $this->Store->Sale->find('first',array('conditions'=>array('Sale.stores_id'=>$id)));
		$this->Store->PurchaseCost->recursive = 0;

		//load model Lookup
		$this->loadModel('Lookup');
		/*
			$subqueryOptions = array('fields' => array('competence_id'), 'conditions' => array('employee_id'=>$user_id));
			$subquery = $this->Competence->CompetenceRating->subquery('all', $subqueryOptions);

			$res = $this->Competence->CompetenceRating->find('all', array(
			    'conditions' => array('id NOT IN '. $subquery)
			));

		*/

		$purchaseCosts = $this->Store->PurchaseCost->find('all',array(
			'conditions'=>array('PurchaseCost.store_id'=>$id),
			));

		$purchaseCostsAmt = $this->Store->PurchaseCost->find('first', array(
    						'conditions' =>array('store_id'=>$id),
    						'fields' => array('sum(amount) as total_sum')
						        )
						    );
		$this->set(compact('sale','purchaseCosts','purchaseCostsAmt'));

		//$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
		//$this->set('store', $this->Store->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {

			$this->request->data['Store']['year_of_made'] = array_shift($this->request->data['Store']['year_of_made']);
			$this->request->data['Store']['year_of_reg'] = array_shift($this->request->data['Store']['year_of_reg']);
			$this->request->data['Store']['reg_no'] =  strtoupper(str_replace(" ", "",$this->request->data['Store']['reg_no']));
			
			//If the car is not yet sold, disallowed creating new car in store.
			$this->Store->recursive = 0;
			$obj_exist = $this->Store->find('first',array(
				'conditions'=>array(
					'Store.reg_no'=>$this->data['Store']['reg_no'],
					'Store.in_store'=>1,
					),
				'order'=>'Store.created DESC')
				);

			if(!empty($obj_exist)) {
				$this->Flash->error("Error: The car already inside your store.");
				//$this->redirect(array('controller'=>'stores','action' => 'add'));
			}else {
				$this->Store->create();
				if ($this->Store->save($this->request->data)) {
					$this->Flash->success(__('The store has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The store could not be saved. Please, try again.'));
					debug($this->Store->validationErrors); //show validationErrors

					debug($this->Store->getDataSource()->getLog(false, false));
    				return false;
				}
			}

			
		}
		$makes = $this->Store->Make->find('list');
		$mods = $this->Store->Mod->find('list');
		$manufactures = $this->Store->Manufacture->find('list');
		$this->set(compact('makes', 'mods', 'manufactures'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Store->save($this->request->data)) {
				$this->Flash->success(__('The store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The store could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
			$this->request->data = $this->Store->find('first', $options);
		}
		$makes = $this->Store->Make->find('list');
		$mods = $this->Store->Mod->find('list');
		$manufactures = $this->Store->Manufacture->find('list');
		$this->set(compact('makes', 'mods', 'manufactures'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Store->delete()) {
			$this->Flash->success(__('The store has been deleted.'));
		} else {
			$this->Flash->error(__('The store could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	private function checkDocument($id) {
    	$this->Store->Document->recursive = - 1;
		$doc = $this->Store->Document->find ( 'first', array ('conditions' => array ('Document.store_id' => $id ) ) );
		if ($doc ['Document'] ['grant_ori'] == 0)
			$doc ['Document'] ['incomplete'] [] = "Geran Original";
		if ($doc ['Document'] ['seller_ic'] == 0)
			$doc ['Document'] ['incomplete'] [] = "Salinan IC customer";
		if ($doc ['Document']['auth_letter'] == 0) $doc['Document']['incomplete'][]="Authorization Letter";
		if ($doc ['Document']['stms'] == 0) $doc['Document']['incomplete'][]="STMS";

    	return $doc;
    }
}
