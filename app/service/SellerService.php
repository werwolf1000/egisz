<?php

namespace service;

use Exception;
use model\SellerModel;

class SellerService
{
    /**
     * @throws Exception
     */
    public function getSellers($options): array
    {
        $model = new SellerModel();
        if(!empty($options['version'])) {
            $model->where('version', $options['version']);
        }

        if(isset($options['start']) && isset($options['offset'])) {
            $model->limit($options['start'], $options['offset']);
        }
        return $this->format($model->get());
    }


    /**
     * @throws Exception
     */
    public function getChangeSellers(): array
    {
        $model = new SellerModel();
        $sql = "WITH t AS(SELECT s.id, s.name, s.phone, s.version FROM sellers s GROUP BY s.phone),
                t2 AS(SELECT t.id, t.name, t.phone, t.version FROM t GROUP BY t.name HAVING COUNT(t.name) > 1)
                SELECT t.* FROM t 
                INNER JOIN t2 on t.name = t2.name
                ORDER BY t.name, t.version";

        $data = $this->format($model->queryExec($sql));
        $arr = [];
        foreach ($data as $key => $val) {
            if($key != 0 && $data[$key-1]['name'] === $val['name']) {
                if(!isset($arr[$val['name']])) {
                    $arr[$val['name']] = "В {$val['name']} был изменен номер телефона ";
                }
                $arr[$val['name']] .="{$data[$key - 1]['phone']} -> {$val['phone']}";
            }
        }
        return array_values($arr);
    }

    private function format($data): array
    {
        $arr = [];
        foreach ($data as $val) {
            $arr[] = array_intersect_key((array)$val, array_flip(['name', 'phone','version']));
        }
        return $arr;
    }
}