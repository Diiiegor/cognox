<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = 'cuentas';
    protected $fillable = [
        'int_cuenta',
        'int_user_id',
        'int_saldo',
        'int_activa',
    ];

    public function getCreatedAtAttribute()
    {
        return date('Y/m/d', strtotime($this->attributes['created_at']));
    }

}
