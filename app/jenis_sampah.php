<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_sampah extends Model
{
    protected $table = 'jenis_sampah';
    
    protected $fillable = ['jenis_sampah','harga'];

}
