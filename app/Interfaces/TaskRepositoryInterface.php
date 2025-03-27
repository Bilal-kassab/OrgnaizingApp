<?php

namespace App\Interfaces;

interface TaskRepositoryInterface
{
    public function getAll($roomId);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
