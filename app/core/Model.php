<?php

namespace App\Libraries;

use App\Models\Users;

class Models extends Users {
    public function __construct()
    {
        echo 'Model constructor';
    }
}