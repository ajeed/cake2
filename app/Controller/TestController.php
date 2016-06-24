<?php

class TestController extends AppController {
	
	var $name = 'Test';
	var $uses = array('Store','Make','Mod');
	var $helpers = array('Js' => 'Jquery'); 
	var $components = array('RequestHandler','Email');
	
	
	
	public function index() {
   		$this->set('names', $this->Make->find('list'));
 	}
 
	 public function get_models_ajax() {
		Configure::write ( 'debug', 0 );
		if ($this->RequestHandler->isAjax ()) {
			$this->set ( 'mods', $this->Make->Mod->find ( 'list', array (
			'conditions' => array (
			'Mod.make_id' => $this->params ['url'] ['makeId'] ),
			'recursive' => - 1 ) ) );
		}
	}
	
	public function viewPdf($id = null) {
		if (! $id) {
			$this->Session->setFlash ( 'Sorry, there was no property ID submitted.' );
			$this->redirect ( array ('action' => 'index' ), null, true );
		}
		
//		Configure::write('debug',0); // Otherwise we cannot use this method while developing 

        $id = intval($id); 
        $stores = $this->Store->find('all');
        $this->set(compact('stores'));
//        $this->viewPath('stores');
		
//        $property = $this->__view($id); // here the data is pulled from the database and set for the view 
//
//        if (empty($property)) 
//        { 
//            $this->Session->setFlash('Sorry, there is no property with the submitted ID.'); 
//            $this->redirect(array('action'=>'index'), null, true); 
//        } 
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
	}
	
	function sendmail() {
		$this->Email->smtpOptions = array (
			'port' => '26', 
			'timeout' => '30', 
			'host' => 'mail.afha.com.my', 
			'username' => 'admin@afha.com.my', 
			'password' => '1234qwer' );
		/* Set delivery method */
		$this->Email->delivery = 'smtp';
//		$this->Email->delivery = 'debug';
		
		/* Check for SMTP errors. */
		$this->Email->from = 'No-Reply <no-reply@afha.com.my>';
		$this->Email->to = 'Somebody Else <hafidzi@gmail.com>';
		$this->Email->subject = 'Test';
		$this->Email->template = 'test';
		$this->Email->sendAs = 'text';
		$this->Email->send();
		$this->set('smtp_errors', $this->Email->smtpError);
	}

	function getModel($val) {

		if($this->request->is('ajax')) {
			Configure::write('debug', 0);
	        $this->layout=null;
	        $list = $this->Mod->find('list',array('conditions'=>array('make_id'=>$val)));
	        echo json_encode($list);
	        exit;
	        // What else?

	    }

	}
	
}