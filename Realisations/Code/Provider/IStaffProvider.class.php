<?php

namespace Code\Provider;

use Code\Model\Staff;

interface IStaffProvider {
    public function findAll(): array;

    public function findOne(int $id): Staff;

    public function findAllByName(string $name):array;
    
    public function updateStaff(Staff $newStaff): bool;

    public function insertStaff(Staff $newStaff): bool;

    public function deleteStaff(Staff $Staff): bool;
}