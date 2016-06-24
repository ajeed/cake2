<?php
    class DashboardController extends AppController {

          var $name = 'Dashboard';
          var $uses = array('Store');
          
          function beforeRender() {
          }
          function index () {

            $this->set('cntAvailable',$this->Store->getCountAvailable());
            $this->set('cntPendingDocs',count($this->Store->getDocPending()));

          }
    }

?>
