<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    protected $table="pengembalis";
    protected $primaryKey="id";
    protected $fillable=['nama','NIM', 'judul', 'ISBN', 'tanggal_kembali', 'keterlambatan', 'petugas'];
}
