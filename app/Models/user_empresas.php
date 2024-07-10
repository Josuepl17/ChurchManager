<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_empresas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id',  'empresa_id' ];

       protected $table = 'user_empresas';



}
