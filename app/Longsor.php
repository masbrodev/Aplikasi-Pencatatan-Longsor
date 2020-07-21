<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Longsor extends Model
{
    protected $table = 'data_longsor';
    protected $primaryKey = 'id';
    protected $fillable = ['desa','kecamatan', 'jumlah_kejadian', 'tahun'];
}
