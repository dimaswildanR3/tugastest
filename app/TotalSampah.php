<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalSampah extends Model
{
    protected $table = 'total_sampah';
    
    protected $fillable = ['user_id', 'hasil', 'penyimpangan', 'status', 'id_jumlah_sampah'];


    // public function jenisSampah()
    // {
    //     return $this->belongsTo(JenisSampah::class, 'jenis_sampah_id');
    // }

    public function jumlahSampah()
    {
        return $this->belongsTo(JumlahSampah::class, 'id_jumlah_sampah');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
