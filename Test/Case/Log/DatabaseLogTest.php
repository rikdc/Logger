<?php
/**
 * DatabaseLogTest file
 *
 * PHP 5
 *
 * @since         CakePHP(tm) v 1.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('DatabaseLog', 'Logger.Log/Engine');

/**
 * DatabaseLogTest class
 *
 * @package       Logger.Test.Case.Log.Engine
 */
class DatabaseLogTest extends CakeTestCase
{
    public $fixtures = array('plugin.logger.log');

    public $uses = array('Log');

    public function startTest($method) {
        $this->LogTest = ClassRegistry::init('Log');
    }

    public function endTest($method) {
        unset($this->LogTest);
    }
/**
 * testLogFileWriting method
 *
 * @return void
 */
    public function testLogFileWriting() {

        $log = new DatabaseLog();
        $log->write('warning', 'Test warning');
        $this->assertTags($this->LogTest->find('count'), 1);

        $log_entry = $this->LogTest->find('first');
        $this->assertEqual($log_entry['Log']['type_id'], LOG_WARNING);
        $this->assertEqual($log_entry['Log']['message'], 'Test warning');

        $this->LogTest->deleteAll(array(1 => 1));

        $log->write('debug', 'Test debug');
        $log_entry = $this->LogTest->find('first');
        $this->assertEqual($log_entry['Log']['type_id'], LOG_DEBUG);
        $this->assertEqual($log_entry['Log']['message'], 'Test debug');

        $this->LogTest->deleteAll(array(1 => 1));
        $log->write('error', 'Test error');

        $log_entry = $this->LogTest->find('first');
        $this->assertEqual($log_entry['Log']['type_id'], LOG_ERR);
        $this->assertEqual($log_entry['Log']['message'], 'Test error');

        $this->LogTest->deleteAll(array(1 => 1));
        $log->write('random', 'Test random');

        $log_entry = $this->LogTest->find('first');
        $this->assertEqual($log_entry['Log']['type_id'], LOG_INFO);
        $this->assertEqual($log_entry['Log']['message'], 'Test random');
    }
}
