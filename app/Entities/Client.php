<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'title',
        'cnpj',
        'address',
        'phone',
        'state',
        'city',
        'neighborhood',
        'number',
        'complement',
    ];

}
