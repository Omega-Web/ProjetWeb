<?php

namespace Code\Controller;

use Code\Model\User;
use Code\Repository\UserRepository;
use Code\Infrastructure\Database;
use Code\Repository\Movie_userRepository;
use Code\Service\UserService;
use Code\Service\MailService;



class SubscriptionController
{
    private $userService;
    private $mailService;

    public function __construct()
    {
        $userRepo = new UserRepository(Database::get());
        $userMovieRepo = new Movie_userRepository(Database::get());

        $this->userService = new UserService($userRepo,$userMovieRepo);
        $this->mailService = new MailService();
    }

    public function createUser($tabUser)
    {
        $this->userService->insertUser(new User($tabUser));
    }
    public function sendMail($firstname,$email)
    {
        $this->mailService->mailConfirm($firstname,$email);
    }
}
