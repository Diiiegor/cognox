<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaInscrita extends Model
{
    use HasFactory;

    protected $table = 'cuentas_inscritas';

    protected $fillable = [
        'int_id_cuenta',
        'int_id_usuario',
        'int_activa'
    ];

    public function cuenta()
    {
        return $this->hasOne(Cuenta::class, 'id', 'int_id_cuenta');
    }

    public function getCreatedAtAttribute()
    {
        return date('Y/m/d', strtotime($this->attributes['created_at']));
    }

}
