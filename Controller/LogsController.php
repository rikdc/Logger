<?php
/**
 * Copyright 2008-2010, UGR Works Limited.
 *
 * @copyright    Copyright 2008-2010, UGR Works Limited
 * @license      http://www.ugrworks.com/license UGR Works Commercial License
 */
App::uses('Sanitize', 'Utility');

class LogsController extends AppController
{
    public $uses = array('Logger.Log');

    public $paginate = array(
        'Log' => array(
            'limit' => 30,
            'order' => 'created DESC'
        )
    );

    public function admin_index() {
        $this->pageTitle = __('Error Logs');
        parent::admin_index();
    }

    public function admin_view($id) {
        $this->pageTitle = __('Viewing Entry');
        $this->set('log', $this->Log->findById($id));
    }
}