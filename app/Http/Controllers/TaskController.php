<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\View;

class TaskController extends Controller
{
   public function tasks() {
      $tasks = Task::whereNull('parent_task_id')
         ->with('childItems')
         ->get();
      return View::make('Task.tasks', ['tasks' => $tasks]);
   }

   public function task($task) {
      return 'Задача';
   }

   public function editTask() {
      return 'Редактирование задачи';
   }

   public function deleteTask() {
      return 'Удаление задачи';
   }

   public function newTask() {
      return View::make('Task.newTask');
   }
   public function createTask(  ) {
      $faker = \Faker\Factory::create();
      Task::create ([
         'title' => 'Задача '.rand(0, 9999),
         'description' => $faker->paragraph,
      ]);
      return 'Новая';
   }
}
