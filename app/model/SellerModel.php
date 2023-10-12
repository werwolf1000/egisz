<?php

namespace model;

use vendor\db\Model;

class SellerModel extends Model
{
    protected static string $table = 'sellers';
    public int $id;
    public string $name;
    public string $version;
}