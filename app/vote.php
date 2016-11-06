<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    protected $primaryKey = 'Question_id';
    protected $table = 'daly_question';
}
