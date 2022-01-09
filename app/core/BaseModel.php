<?php

namespace App\Core;

use App\Database\DB;

class BaseModel extends DB {
    protected $_tableName;
    public function __construct()
    {
        echo 'Model constructor';
    }
}