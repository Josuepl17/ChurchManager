<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    use HasFactory;
    protected $fillable = ['razao', 'cnpj', 'id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_empresas', 'empresa_id', 'user_id');
    }

    public function membros (){
        return $this->hasMany(membros::class, 'empresa_id'); // tem muitos
    }
 
}
