<?php

namespace command;

use Exception;
use service\SellerService;
use vendor\core\Controller;

class SellerCommand extends Controller
{
    /**
     * Реализовать метод отдающий данные по справочнику, учитывающий пагинацию и фильтр по версии
     * @throws Exception
     */
    public function getSellers($options): void
    {
        $res = (new SellerService())->getSellers($options);
        echo $this->render('test1.php', ['data' => $res]);
    }

    /**
     * Реализовать метод показывающий изменения между версиями справочника
     * @return void
     * @throws Exception
     */
    public function getChangeSellers(): void
    {
        $res = (new SellerService())->getChangeSellers();
        echo $this->render('test2.php', ['data' => $res]);
    }
}