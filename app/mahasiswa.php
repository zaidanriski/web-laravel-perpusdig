<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table="mahasiswas";
    protected $primaryKey="id";
    protected $fillable=['nama','NIM', 'prodi'];
}
