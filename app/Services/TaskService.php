<?php

namespace App\Services;

use App\DTOs\Task\CreateTaskDTO;
use App\DTOs\Task\UpdateTaskDTO;
use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;

class TaskService
{
    public function __construct(private TaskRepositoryInterface $repository) {}

    public function create(CreateTaskDTO $dto): Task
    {
        return $this->repository->create([
            'title'       => $dto->title,
            'description' => $dto->description,
            'status'      => $dto->status,
            'user_id'     => $dto->userId,
        ]);
    }

    public function update(Task $task, UpdateTaskDTO $dto): Task
    {
        return $this->repository->update([
            'title'       => $dto->title,
            'description' => $dto->description,
            'status'      => $dto->status,
        ]);
    }

    public function delete(Task $task): void
    {
        $this->repository->delete($task);
    }
}
