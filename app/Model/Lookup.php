<?php

App::uses('Model', 'Model');

class Lookup extends Model {

	public $displayField = 'value';

	public $name = 'Lookup';

	public $useTable = 'lookup';

	public $hasMany = array(
		'Voucher' => array(
			'className' => 'Voucher',
			'foreignKey' => 'lookup_id',
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
}
