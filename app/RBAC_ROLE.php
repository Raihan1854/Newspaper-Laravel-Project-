<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RBAC_ROLE extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'roles';
}
