<?php
App::uses('AppModel', 'Model');
/**
 * Store Model
 *
 * @property Make $Make
 * @property Mod $Mod
 * @property Manufacture $Manufacture
 * @property Document $Document
 * @property PurchaseCost $PurchaseCost
 */
class Store extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'seller_ic' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $name = 'Store';

	public $displayField = 'reg_no';

	public $virtualFields = array(
    	'year' => 'CONCAT(Store.year_of_made, " / ", Store.year_of_reg)',
    	'full_title' => 'CONCAT(Make.name, " ",Mod.name," ",Store.title)'
    );

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Make' => array(
			'className' => 'Make',
			'foreignKey' => 'make_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Mod' => array(
			'className' => 'Mod',
			'foreignKey' => 'mod_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Manufacture' => array(
			'className' => 'Manufacture',
			'foreignKey' => 'manufacture_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PurchaseCost' => array(
			'className' => 'PurchaseCost',
			'foreignKey' => 'store_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Sale' => array(
			'className' => 'Sale',
			'foreignKey' => 'stores_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

	/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'store_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

	public function getCountAvailable() {
   		$this->recursive = -1;
   		return $this->find('count',array('conditions'=>array('in_store'=>1)));
    }

    public function getDocPending($cond = false) {
        	
        $conditions = array(
        	'conditions'=>array(
        		"OR"=>array(
        			'Document.grant_ori'=>0,
					'Document.seller_ic'=>0,
					'Document.auth_letter'=>0,
					'Document.stms'=>0,
					)),
					'fields'=>array(
						'Document.id','Document.store_id',
					)
				);
        $this->Document->recursive = -1;
        return($this->Document->find('list',$conditions))	;
        
    }

    public function getUnderFinance() {
    	$conditions = array(
        	'conditions'=>array(
        		'Store.under_finance' => 1
				),
        	'fields'=>array(
						'Store.id'
				)
        	);
        $this->recursive = -1;
        return($this->find('list',$conditions));
    }

}
