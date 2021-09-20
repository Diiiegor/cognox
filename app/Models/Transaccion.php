<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';
    protected $fillable = [
        'int_cuenta_origen',
        'int_cuenta_destino',
        'int_user_id',
        'int_monto'
    ];
}
