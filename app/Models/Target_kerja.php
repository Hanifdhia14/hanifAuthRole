<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target_kerja extends Model
{
    protected $table = 'set_target_user';
    protected $fillable= ['kode_kuadran', 'kode_kpi', 'kode_satuan', 'kode_nilai', 'kode_nmax', 'kode_dcm','bobot','target_absolut'];
}
