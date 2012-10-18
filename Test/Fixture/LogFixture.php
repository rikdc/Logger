<?php

class LogFixture extends CakeTestFixture {
    public $name = 'Log';

    public $fields = array(
        'id' => array('type' => 'integer','null' => true,'default' => NULL,'key' => 'primary'),
        'type_id' => array('type' => 'integer','null' => true,'default' => NULL),
        'message' => array('type' => 'string','null' => true,'default' => NULL),
        'created' => array('type' => 'datetime','null' => true,'default' => NULL),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
    );

    public $records = array();
}