<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $primaryKey = 'tag_id';

    protected $fillable = ['name_tag'];

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'tags_tasks', 'tag_id', 'task_id');
    }
}
