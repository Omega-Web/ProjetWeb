<?php
namespace Code\Service;

use Code\Model\Movie_user;
use Code\Model\User;
use Code\Provider\IMovie_userProvider;
use Code\Provider\IUserProvider;



class UserService implements IUserProvider
{
    private IUserProvider $UserAccess;
    private IMovie_userProvider $Movie_userAccess;

    public function __construct(IUserProvider $u, IMovie_userProvider $mu)
    {
        $this->UserAccess = $u;
        $this->Movie_userAccess = $mu;
    }

    public function findAll(): array
    {
        $users = $this->UserAccess->findAll();

        foreach($users as $user)
        {
            $ids =  $this->Movie_userAccess->findAllByIdUser($user->getId());
            $user->setId_movies($ids);
        }
        return $users;
    }

    public function findOne(int $id): User
    {
        $user = $this->UserAccess->findOne($id);
        $ids =  $this->Movie_userAccess->findAllByIdUser($user->getId());
        $user->setId_movies($ids);
        return $user;
    }

    public function updateUser(User $user): bool
    {
        return $this->UserAccess->updateUser($user);
    }

    public function deleteUser(User $user): bool
    {
        return $this->UserAccess->deleteUser($user);
    }

    public function insertUser(User $user): bool
    {
        return $this->UserAccess->insertUser($user);
    }
}

?>