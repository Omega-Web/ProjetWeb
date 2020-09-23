<?php

namespace Code\Provider;

use Code\Model\User;

interface IUserProvider {
    public function findAll(): array;

    public function findOne(int $id): User;

    public function saveUser($array);

    public function update(User $oldUser, User $newUser): bool;

    public function insert(User $newUser): bool;

    public function delete(User $user): bool;
}