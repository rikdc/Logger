<?php
/**
 * Syslog Storage stream for Logging
 *
 * PHP versions 4 and 5
 *
 * Copyright 2008-2010, UGR Works Limited.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright    Copyright 2008-2010, UGR Works Limited
 * @package       sunshine
 * @subpackage    sunshine.cake.libs.log
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('ClassRegistry', 'Utility');
App::uses('CakeLogInterface', 'Log');
/**
 * DatabaseLog for Logging.
 *
 * @package sunshine
 * @subpackage sunshine.cake.libs.log
 */
class DatabaseLog implements CakeLogInterface
{
    private function _setup_model() {
        $this->_model = ClassRegistry::init(array(
            'class' => 'Log'
        ));
    }

/**
 * Implements writing to the specified syslog
 *
 * @param string $type The type of log you are making.
 * @param string $message The message you want to log.
 * @return boolean success of write.
 */
    public function write($type, $message) {
        $debugTypes = array('notice', 'info', 'debug');
        $priority = LOG_INFO;

        if ($type == 'error') {
            $priority = LOG_ERR;
        } elseif ($type == 'warning') {
            $priority = LOG_WARNING;
        } elseif (in_array($type, $debugTypes)) {
            $priority = LOG_DEBUG;
        }
        
        if (!isset($this->_model)) {
            $this->_setup_model();
        }

        $this->_model->create();
        $result =  $this->_model->save(array(
            'type_id' => $priority,
            'message' => $message
        ));

        return !empty($result);
    }
}