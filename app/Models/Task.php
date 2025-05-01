<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TaskStatusEnum;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    protected $casts = [
        'status' => TaskStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
