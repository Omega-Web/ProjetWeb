<?php

namespace Code\Provider;

use Code\Model\User;

interface IUserProvider {
    public function findAll(): array;

    public function findOne(int $id): User;

    public function createUser($array): bool;

    public function updateUser($array): int;

    public function delUser($array): bool;
}