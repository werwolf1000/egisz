<?php

namespace vendor\core;

use Exception;

class CommandFabric
{
    /**
     * @throws Exception
     */
    public function build($options): void
    {
        $command = new \command\SellerCommand();
        switch($options['command']) {
            case 'get-sellers':  $command->getSellers($options); break;
            case 'get-change-sellers': $command->getChangeSellers($options); break;
            default : throw new Exception('Команда не найдена');
        }
    }
}