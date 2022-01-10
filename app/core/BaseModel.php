<?php

namespace App\Core;

use App\Database\DB;

class BaseModel extends DB
{
    protected $_tableName;
    public function __construct($tableName)
    {
        parent::__construct();
        $this->_tableName = $tableName;
    }

    public function all()
    {
       return $this->fetchAllData($this->_tableName);
    }
}
