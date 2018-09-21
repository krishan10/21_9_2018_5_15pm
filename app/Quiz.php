<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'course_quiz';
    public $primaryKey = 'course_quiz_id';
}
