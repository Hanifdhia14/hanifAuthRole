<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahunan extends Model
{
    protected $table = "tbl_tahunan";
    protected $fillable= ['id_tahun','id_settarget_kerja','nama_thn','nilai_thn'];
}
