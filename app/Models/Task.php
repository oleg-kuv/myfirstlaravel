<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
   use HasFactory;
   //protected $dateFormat = 'd.m.Y H:i';
   protected $fillable = ['title',
                          'description',
   #                       'created_at',
                          'updated_at',
                          'finish_before',
                        ];
   public function items() {
      return $this->hasMany(Task::class, 'parent_task_id');
   }
   public function childItems () {
      return $this->hasMany(Task::class, 'parent_task_id')->with('items');
   }
   public function getCreatedAtAttribute ( $value ) {
      return $value != NULL ? (new Carbon($value))->format('d.m.Y H:i') : '';
   }
   public function getModifiedAtAttribute ( $value ) {
      return $value != NULL ? (new Carbon($value))->format('d.m.Y H:i') : '';
   }
   public function getFinishBeforeAttribute ( $value ) {
      return $value != NULL ? (new Carbon($value))->format('d.m.Y H:i') : '';
   }
   #public function setFinishBeforeAttribute ( $value ) {
   #   $this->attributes['finish_before'] = (new Carbon($value))->format($dateFormat);
   #}
   //public $timestamps = true;
}
