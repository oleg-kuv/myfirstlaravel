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
            //$table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->string('name');
            $table->text('description')->nullable();
        });
       $data = [
            ['name' => 'new'],
            ['name' => 'in_work'],
            ['name' => 'completed'],
            ['name' => 'canceled'],
            ['name' => 'postponed']
         ];
      //Model::insert($data);
       \DB::table('statuses')->insert($data);
       }
       if (!Schema::hasTable('tasks')) {
        Schema::create('tasks', function (Blueprint $table) {
            $statusNew = DB::table('statuses')
               ->select('id')
               ->where('name', 'new')
               ->first()->id;
            $table->id();
            //$table->timestamps();
            $table->timestamp ('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp ('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->string    ('title');
            $table->text      ('description')->nullable();
            $table->bigInteger('parent_task_id')->unsigned()->nullable();
            $table->timestamp ('finish_before')->nullable();
            $table->enum      ('run_status', ['running', 'stopped'])->default('stopped')->nullable();
            $table->timestamp ('run_status_modified_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger('status')->unsigned()->default($statusNew);
            $table->foreign   ('status')->references('id')->on('statuses');
            $table->timestamp ('status_modified_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp ('status_expires_at')->nullable();
            $table->bigInteger('next_status')->unsigned()->nullable();
            $table->foreign   ('next_status')->references('id')->on('statuses');
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
