<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillable = ['name_category'];
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'category_id', 'category_id');
    }
}
