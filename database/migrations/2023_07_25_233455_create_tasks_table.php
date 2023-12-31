<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_task_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('alias')->unique();
            $table->enum('status', ['pendiente', 'en progreso', 'completada'])->default('pendiente');
            $table->date('initial_date')->nullable();
            $table->date('final_date')->nullable();
            $table->json('assigned_users')->nullable();
            $table->json('time_used')->nullable();
            $table->integer('percentage')->default(0);
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
