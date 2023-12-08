<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dizimos extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nome', 'data', 'valor'];

    public function usuarios(){
        return $this->belongsTo('App\Models\usuarios');
    }
}
