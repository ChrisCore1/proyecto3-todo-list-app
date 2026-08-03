<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'status'
    ];

    protected $casts = [ 'status' => 'boolean'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tags_tasks', 'task_id', 'tag_id');
    }
}
