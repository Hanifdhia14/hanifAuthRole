<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = "tbl_semester";
    protected $fillable= ['id_semester','id_settarget_kerja','semester1','semester2','tgl_semester'];
}
