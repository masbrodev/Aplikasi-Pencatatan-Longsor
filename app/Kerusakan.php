<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = 'kerusakan';
    protected $primaryKey = 'id';
    protected $fillable = ['kecamatan', 'kelurahan', 'jenis_kerusakan', 'penyebab', 'jumlah_kerusakan'];
}
