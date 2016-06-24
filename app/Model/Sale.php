<?php
App::uses('AppModel', 'Model');
/**
 * Sale Model
 *
 * @property Stores $Stores
 * @property Salestype $Salestype
 * @property SaleDtl $SaleDtl
 */
class Sale extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'stores_id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Stores' => array(
			'className' => 'Stores',
			'foreignKey' => 'stores_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Salestype' => array(
			'className' => 'Salestype',
			'foreignKey' => 'salestype_id',
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
		'SaleDtl' => array(
			'className' => 'SaleDtl',
			'foreignKey' => 'sales_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	/**
	 * Function to return the status of cars, either sold yet or not.
	 * @param int $store_id
	 * @return boolean
	 */
	public function isSold($store_id) {
		$conditions = array('stores_id'=>$store_id);
		return($this->find('count',array('conditions'=>$conditions)));
	}


}
