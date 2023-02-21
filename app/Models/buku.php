<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = "tbl_buku";
    protected $primaryKey = "idbuku";
    protected $fillable = ['kodebuku', 'judul', 'pengarang', 'penerbit', 'created_at', 'updated_at'];
}
