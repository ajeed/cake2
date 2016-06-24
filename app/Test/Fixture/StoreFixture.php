<?php
/**
 * Store Fixture
 */
class StoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'reg_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'make_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mod_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manufacture_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'year_of_made' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 4),
		'year_of_reg' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 4),
		'seller_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'seller_tel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'seller_ic' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'broker_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'broker_tel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'walk_in' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'price' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'image' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'remarks' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'in_store' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'in_store' => array('column' => 'in_store', 'unique' => 0),
			'reg_no' => array('column' => 'reg_no', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'reg_no' => 'Lorem ipsum dolor sit amet',
			'make_id' => 1,
			'mod_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'manufacture_id' => 1,
			'year_of_made' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'year_of_reg' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'seller_name' => 'Lorem ipsum dolor sit amet',
			'seller_tel' => 'Lorem ipsum dolor sit amet',
			'seller_ic' => 'Lorem ipsum dolor sit amet',
			'broker_name' => 'Lorem ipsum dolor sit amet',
			'broker_tel' => 'Lorem ipsum dolor sit amet',
			'walk_in' => 1,
			'price' => 1,
			'date' => '2016-03-14 07:53:55',
			'image' => 'Lorem ipsum dolor sit amet',
			'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'in_store' => 1,
			'created' => '2016-03-14 07:53:55',
			'modified' => '2016-03-14 07:53:55'
		),
	);

}
