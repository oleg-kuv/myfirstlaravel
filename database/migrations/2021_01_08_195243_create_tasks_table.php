<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('statuses')) {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('description');
        });
       }
       if (!Schema::hasTable('tasks')) {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->integer('parent_task_id')->unsigned();
            $table->dateTime('finish_before');
            $table->enum('run_status', ['running', 'stopped'])->default('stopped');
            $table->dateTime('run_status_modified_at');
            $table->integer('status')->unsigned();
            $table->foreign('status')->references('id')->on('statuses');
            $table->dateTime('status_modified_at');
            $table->dateTime('status_expires_at');
            $table->integer('next_status')->unsigned();
            $table->foreign('next_status')->references('id')->on('statuses');
        });
        Schema::table('tasks', function($table){
            $table->foreign('parent_task_id')->references('id')->on('tasks');
        });
       }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('statuses');
    }
}
