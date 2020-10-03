<?php

namespace Code\Provider;

use Code\Model\User;

interface IUserProvider {
    public function findAll(): array;

    public function findOne(int $id): User;

    public function insertUser( User $user): bool;

    public function updateUser(User $user): bool;

    public function deleteUser(User $user): bool;
}