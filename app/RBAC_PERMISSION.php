<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RBAC_PERMISSION extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'permissions';
}
