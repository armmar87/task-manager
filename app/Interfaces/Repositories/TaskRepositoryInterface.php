<?php

namespace App\Repositories;

use App\Models\Task;

interface TaskRepositoryInterface
{
    public function create(array $data): Task;
    public function update(Task $task, array $data): Task;
    public function delete(Task $task): void;
}
