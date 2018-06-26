<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
	protected $table = 'movies2';
	 public $timestamps = false;
    protected $fillable = ['name','price','actor','email','file'];
}
