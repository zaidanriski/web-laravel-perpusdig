<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    protected $table="peminjams";
    protected $primaryKey="id";
    protected $fillable=['nama','NIM', 'judul', 'ISBN', 'tanggal_pinjam', 'petugas'];
}
