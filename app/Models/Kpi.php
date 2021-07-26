<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $table = 'kpi1';
    protected $fillable= ['kode_kpi','start_date','end_date','nama_kpi','description','polaritas','rumus','satuan','dokumen'];
}
