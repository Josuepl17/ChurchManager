<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos_presencas extends Model
{
    protected $fillable = ['id',  'evento_id',  'membros_id'];
    use HasFactory;
}
