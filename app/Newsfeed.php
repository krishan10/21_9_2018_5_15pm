<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsfeed extends Model
{
    protected $table = 'newsfeed';
    public $primaryKey = 'newsfeed_id';
    public $timestamps = false;
}
