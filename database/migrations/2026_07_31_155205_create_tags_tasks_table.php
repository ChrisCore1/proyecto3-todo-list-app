<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tags_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tags', 'tag_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('task_id')->constrained('tasks', 'task_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['tag_id', 'task_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags_tasks');
    }
};
