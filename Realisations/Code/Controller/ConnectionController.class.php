<?php

namespace Code\Controller;

use Code\Infrastructure\Database;
use Code\Utils\Authentication;
// use Code\Repository\StaffRepository;
// use Code\Repository\UserRepository;
// use Code\Model\User;

class ConnectionController 
{
    private $auth; 

    public function __construct()
    {
        $this->auth = new Authentication(Database::get()); 
    }
    
    public function getUserID($username,$password):int
    {
        return $this->auth->Compare($username,$password);
    }
    
}
