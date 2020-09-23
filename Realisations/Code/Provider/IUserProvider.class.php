<?php

namespace Code\Provider;

use Code\Model\User;

interface IUserProvider {
    public function findAll(): array;

    public function findOne(int $id): User;

    public function saveUser($array);
}