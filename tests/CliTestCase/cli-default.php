<?php
/**
 * Script to test the output from Doctrine_Cli
 *
 * @author Dan Bettles <danbettles@yahoo.co.uk>
 */

require_once(dirname(dirname(__DIR__)) . '/lib/Doctrine/Core.php');
spl_autoload_register(array('Doctrine_Core', 'autoload'));

require_once(__DIR__ . '/TestTask02.php');

$cli = new Doctrine_Cli();
$cli->run($_SERVER['argv']);
