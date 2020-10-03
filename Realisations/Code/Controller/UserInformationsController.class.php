<?php

namespace Code\Controller;

use Code\Infrastructure\Database;
use Code\Model\User;
use Code\Service\UserService;
use Code\Repository\UserRepository;
use Code\Repository\Movie_userRepository;

class UserInformationsController
{
    private $userService;
    private $myUser;
    
    public function __construct()
    {
        $userRepo = new UserRepository(Database::get());
        $userMovieRepo = new Movie_userRepository(Database::get());

        
        $this->userService = new UserService($userRepo,$userMovieRepo);
    }
    public function getUserInfo($userID):User
    {
        $this->myUser = $this->userService->findOne($userID);
        return $this->myUser;
    }
    public function updateUser($tabUser)
    {
       $this->userService->updateUser(new User($tabUser));
    }

    public function getFirstname():string
    {
        return $this->myUser->getFirstname();
    }
    public function getLastname():string
    {
        return $this->myUser->getLastname();
    } 
    public function getUserName():string
    {
        return $this->myUser->getUserName();
    }
     public function getEmail():string
    {
        return $this->myUser->getEmail();
    } 
    public function getPassword():string
    {
        return $this->myUser->getPassword();
    } 
    public function getBirthday():string
    {
        return $this->myUser->getBirthday()->format('Y-m-d');
    }
}
