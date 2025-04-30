<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use App\DTOs\Task\CreateTaskDTO;
use App\DTOs\Task\UpdateTaskDTO;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Filters\TaskFilter;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService) {}

    public function index(Request $request)
    {
        $query = Task::query()
            ->where('user_id', $request->user()->id);

        $query = (new TaskFilter($request))->apply($query);

        $tasks = $query->paginate(10);

        return TaskResource::collection($tasks);
    }
    public function store(StoreTaskRequest $request)
    {
        $dto = new CreateTaskDTO(
            title: $request->title,
            description: $request->description,
            status: $request->status,
            userId: $request->user()->id,
        );

        $task = $this->taskService->create($dto);

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $dto = new UpdateTaskDTO(
            title: $request->title,
            description: $request->description,
            status: $request->status,
        );

        $updatedTask = $this->taskService->update($task, $dto);

        return new TaskResource($updatedTask);
    }

    public function destroy(Task $task)
    {
        $this->taskService->delete($task);

        return response()->json(['message' => 'Task deleted']);
    }
}


