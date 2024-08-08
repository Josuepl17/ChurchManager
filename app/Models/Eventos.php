<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{

    protected $fillable = ['id', 'user_id', 'evento', 'empresa_id', 'presentes', 'faltantes', 'membros'];
    use HasFactory;
}
