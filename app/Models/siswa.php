<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = "tbl_siswa";
    protected $primaryKey = "idsiswa";
    protected $fillable = ['nis', 'namasiswa', 'kelas', 'hp', 'created_at', 'updated_at'];
}
