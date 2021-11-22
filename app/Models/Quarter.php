<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $table = "tbl_quarter";
    protected $fillable= ['id_quarter','id_settarget_kerja','quarter1','quarter2','quarter3','quarter4','tgl_qtr'];
}
