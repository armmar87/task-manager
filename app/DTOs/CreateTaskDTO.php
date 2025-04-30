<?php

namespace App\DTOs\Task;

use App\Enums\TaskStatusEnum;

class CreateTaskDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly TaskStatusEnum $status,
        public readonly int $userId,
    ) {}
}
