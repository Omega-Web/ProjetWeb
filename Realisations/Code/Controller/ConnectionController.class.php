<?php

namespace Code\Controller;

use Code\Infrastructure\Database;
use Code\Utils\Authentication;
use Code\Repository\StaffRepository;
use Code\Repository\UserRepository;
use Code\Model\User;

class ConnectionController 
{
    
    public function __construct()
    {
        $auth       = new Authentication(Database::get()); 
        $userRepo   = new UserRepository(Database::get()); 
        
    }
    
    
}
