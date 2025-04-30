<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskFilter
{
    public function __construct(protected Request $request) {}

    public function apply(Builder $query): Builder
    {
        return $query
            ->when($this->request->filled('search'), function ($q) {
                $search = $this->request->query('search');
                $q->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($this->request->filled('status'), function ($q) {
                $q->where('status', $this->request->query('status'));
            })
            ->when(
                in_array($this->request->query('sort_by'), ['title', 'status', 'created_at']),
                function ($q) {
                    $sortBy = $this->request->query('sort_by', 'created_at');
                    $sortOrder = $this->request->query('sort_order', 'desc');

                    if (!in_array($sortOrder, ['asc', 'desc'])) {
                        $sortOrder = 'desc';
                    }

                    $q->orderBy($sortBy, $sortOrder);
                }
            );
    }
}
