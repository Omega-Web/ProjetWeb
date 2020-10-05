<?php

namespace Code\Controller;

use Code\Model\User;
use Code\Repository\UserRepository;
use Code\Infrastructure\Database;
use Code\Repository\Movie_userRepository;
use Code\Service\UserService;



class SubscriptionController
{
    private $userService;

    public function __construct()
    {
        $userRepo = new UserRepository(Database::get());
        $userMovieRepo = new Movie_userRepository(Database::get());

        $this->userService = new UserService($userRepo,$userMovieRepo);
    }

    public function createUser($tabUser)
    {
        $this->userService->insertUser(new User($tabUser));
    }
    
}
