<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = [
        'first name', 'last name', 'email','amount','phone','payment status','description of payment',
    ];
}
