<?php
namespace App\Models;
use App\Database\DB ;

class Users extends DB
{
    private $_table = 'users';
    public function usersData()
    {
        return $this->fetchAllData($this->_table);
    }
}
