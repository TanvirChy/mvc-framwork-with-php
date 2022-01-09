<?php
namespace App\Models;

use App\Core\BaseModel;

class Users extends BaseModel
{
    private $_table = 'users';
    public function usersData()
    {
        return $this->fetchAllData($this->_table);
    }
}
