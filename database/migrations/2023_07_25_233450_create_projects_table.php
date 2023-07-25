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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('avatar')->nullable();
            $table->string('alias')->unique();
            $table->enum('status', ['iniciado', 'en progreso', 'completado'])->default('iniciado');
            $table->date('initial_date')->nullable();
            $table->date('final_date')->nullable();
            $table->unsignedBigInteger('leader_user_id');
            $table->foreign('leader_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
};
