<?php
error_reporting(E_ERROR);
require_once __DIR__.'/autoload.php';


try {
    (new \vendor\Env\Env(__DIR__.'/.env'))->load();
    $command = new \vendor\core\CommandFabric();
    $command->build((new \vendor\core\Argv())->get());
} catch (\Exception $e) {
    print '['.date('Y-m-d H:i:s').']'.$e->getMessage().' TRACE: '.$e->getTraceAsString().PHP_EOL;
}