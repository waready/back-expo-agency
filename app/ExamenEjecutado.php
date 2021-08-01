<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamenEjecutado extends Model
{
  protected $table = 'examenes_ejecutados';
  protected $fillable = ['id_user_supervisor', 'id_user_supervisado', 'id_tipo'];
}
