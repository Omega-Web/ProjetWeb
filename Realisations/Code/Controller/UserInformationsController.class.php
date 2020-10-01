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

    public function __construct()
    {
        $userRepo = new UserRepository(Database::get());
        $userMovieRepo = new Movie_userRepository(Database::get());

        $this->userService = new UserService($userRepo,$userMovieRepo);
    }
    public function getUserInfo($userID)
    {
        $this->userService->findOne($userID);
    }
    public function updateUser($user)
    {
       $this->userService->updateUser($user);
    }

    public function getFirstname():string
    {
        return $this->userService->getFirstname();
    }
    public function getLastname():string
    {
        return $this->userService->getLastname();
    } 
    public function getUserName():string
    {
        return $this->userService->getUserName();
    }
     public function getEmail():string
    {
        return $this->userService->getEmail();
    } 
    public function getPassword():string
    {
        return $this->userService->getPassword();
    } 
    public function getBirthday():string
    {
        return $this->userService->getBirthday()->format('Y-m-d');
    }
}
