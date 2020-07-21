<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = 'kerusakan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kecamatan'];
}
