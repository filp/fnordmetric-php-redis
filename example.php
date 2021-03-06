<?php
require_once 'FnordmetricApiRedis.php';

# Instantiate the class, create new connect to redis server on 127.0.0.1:6379
$fnord = new FnordmetricApiRedis('127.0.0.1:6379');

# Send a simple event
$fnord->event('new_registration');

# Send a event with extra data
$data = array('referer' => 'facebook');
$fnord->event('new_registration', $data);

# Send a event with extra data and session token
$sessiontoken = 'rtERydysuTY';
$fnord->event('_set_name', array("name" => "Goodman"), $sessiontoken);
$fnord->event('new_registration', array('referer' => 'twitter'), $sessiontoken);
?>