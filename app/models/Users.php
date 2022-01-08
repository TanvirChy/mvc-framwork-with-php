<?php

class Users extends Database
{
    private $_table = 'users';
    public function pageData()
    {
        return $this->fetchAllData($this->_table);
    }
}
