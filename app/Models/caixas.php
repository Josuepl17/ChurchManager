<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caixas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'dataini', 'datafi', 'totalofertas', 'totaldespesas', 'totaldizimos'];
}
