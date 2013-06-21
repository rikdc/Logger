<?php
$options = array('engine' => 'Logger.EmailLogger');

try {
    Configure::load('Logger.config');
    $options = array_merge(Configure::read('EmailLogger'), $options);
} catch (ConfigureException $e) {}

App::uses('CakeLog', 'Log');
CakeLog::config('email', $options);