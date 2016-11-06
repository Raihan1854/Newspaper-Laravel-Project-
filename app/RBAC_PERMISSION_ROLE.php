<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RBAC_PERMISSION_ROLE extends Model
{
  protected $primaryKey = 'unique_code';
  protected $table = 'permission_role';
}
