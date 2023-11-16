<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JumlahSampah extends Model
{
    protected $table = 'jumlah_sampah';
    
    protected $fillable = ['jumlah_sampah','jenis_sampah_id','user_id'];

    public function jenis_sampaho()
    {
      return $this->belongsTo(jenis_sampah::class, 'jenis_sampah_id');
       
      }
    public function User()
    {
      return $this->belongsTo(User::class, 'user_id');
       
      }
}
