<?php

namespace Code\Provider;

use Code\Model\Staff;

interface IStaffProvider {
    public function findAll(): array;

    public function findOne(int $id): Staff;

    public function findAllByName(string $name):array;

    public function update(Staff $oldStaff, Staff $newStaff): bool;

    public function insert(Staff $newStaff): bool;

    public function delete(Staff $staff): bool;
}