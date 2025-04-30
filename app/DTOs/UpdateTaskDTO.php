<?php

namespace App\DTOs\Task;

use App\Enums\TaskStatusEnum;
class UpdateTaskDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly TaskStatusEnum $status,
    ) {}
}
