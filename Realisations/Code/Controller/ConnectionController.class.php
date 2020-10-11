<?php

namespace Code\Controller;

use Code\Infrastructure\Database;
use Code\Utils\Authentication;
use Code\Model\User;

class ConnectionController
{
    private $auth;

    public function __construct()
    {
        $this->auth = new Authentication(Database::get());
    }

    public function getUser($username, $password): User
    {
        return $this->auth->Compare($username, $password);
    }

    public function getPathFromId($id_usertype): string
    {
        if ($id_usertype == 0) {
            return 'Location: ../Authentication/Subscription.php';
        } else if ($id_usertype == 1) {
            return 'Location: ../Admin/AdminRedirect.php';
        } else if ($id_usertype == 2) {
            return 'Location: ../MovieSearch/MovieSearch.php';
        }
        return 'Location: ../MovieSearch/MovieSearch.php';
    }
}
