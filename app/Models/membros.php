<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membros extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nome', 'sobrenome', 'funcao', 'endereco', 'telefone', 'empresa_id', 'user_id'];


    public function dizimos()
    {
        return $this->hasMany(dizimos::class);
    }

    public function empresas()
    {
        return $this->belongsTo(empresas::class); // pertence a
    }


}
