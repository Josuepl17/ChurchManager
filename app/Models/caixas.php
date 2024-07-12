<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caixas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'dataini', 'datafi', 'totalofertas', 'totaldespesas', 'totaldizimos', 'saldo', 'empresa_id', 'user_id'];

    public function empresas(){
        return $this->belongsTo(empresas::class);// pertence a
    }
}
