<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $table = 'tbl_peminjaman';
    protected $primaryKey = 'idpinjam';
    protected $fillable = ['idpetugas', 'idsiswa', 'idbuku', 'created_at', 'updated_at'];

    public function petugas(){
        return $this->belongsTo('App\Models\User', 'idpetugas');
    }
    public function siswa(){
        return $this->belongsTo('App\Models\siswa', 'idsiswa');
    }
    public function buku(){
        return $this->belongsTo('App\Models\buku', 'idbuku');
    }
}
