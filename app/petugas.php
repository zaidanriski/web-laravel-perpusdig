<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table="petugas";
    protected $primaryKey="id";
    protected $fillable=['nama','NIP', 'password'];
}
