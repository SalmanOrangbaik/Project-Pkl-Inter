<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public $fillable = ['ruang_id', 'tanggal', 'jam_mulai', 'jam_selesai', 'keterangan'];

    //relasi ke ruang
    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }
}
