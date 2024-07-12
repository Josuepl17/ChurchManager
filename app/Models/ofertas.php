<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertas extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'data', 'valor', 'id' , 'user_id', 'empresa_id'];



    public function empresas(){
        return $this->belongsTo(empresas::class);// pertence a
    }

  

    
    
}
