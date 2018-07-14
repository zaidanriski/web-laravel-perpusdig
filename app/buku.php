<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $table="bukus";
    protected $primaryKey="id";
    protected $fillable=['judul','pengarang', 'penerbit', 'tahun', 'ISBN', 'jumlah'];
}
