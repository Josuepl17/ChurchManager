<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dizimos extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nome', 'data', 'valor', 'user_id', 'empresa_id', 'membro_id'];


    public function membros()
    {
        return $this->belongsTo(membros::class);
    }

    public function empresas(){
        return $this->belongsTo(empresas::class);// pertence a
    }
}
