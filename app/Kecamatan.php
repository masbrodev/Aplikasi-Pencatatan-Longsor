<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kecamatan'];
    public $timestamps = false;

    public function produk()
    {
        return $this->hasMany('App\Kerusakan', 'kecamatan_id', 'id');
    }
}
