<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kuadran;
use App\Models\Kpi;
use App\Http\Controllers\Target_kerjaController;

class Target_kerja extends Model
{
    protected $table = 'tbl_settarget_kerja';
    protected $fillable= ['id_settarget_kerja','nik_id','tahun','id_kuadran', 'id_kpi', 'tipe_nilai','target_absolut','bobot', 'status', 'komen'];

    public function Kuadran ()
{
    return $this->hasOne(Kuadran::class);
}

public function Kpi ()
{
    return $this ->hasOne(Kpi::class);
}
public function Bulanan()
{
    return $this ->belongsTo(tbl_bulanan::class);
}

    // protected $table= 'tbl_bulanan';
    // protected $fillable= ['id_bulanan','nama_bulan','nilai_bln'];
    // protected $table= 'tbl_quarter';
    // protected $fillable= ['id_bulanan','nama_qtr','nilai_qtr','tgl_qtr'];
    // protected $table= 'tbl_semester';
    // protected $fillable= ['id_bulanan','nama_semester','nilai_semester','tgl_semester'];
    // protected $table= 'tbl_tahunan';
    // protected $fillable= ['id_tahun','nama_thn','nilai_tahun','tgl_tahun'];
}

