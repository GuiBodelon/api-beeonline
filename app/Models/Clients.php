<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'razao_social',
        'cnpj',
        'rua',
        'numero',
        'complemento',
        'pais',
        'cidade',
        'estado',
        'cep',
        'natureza_juridica',
        'email',
        'status'
    ];
}
