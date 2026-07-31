<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'category_id')->nullOnDelete();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
