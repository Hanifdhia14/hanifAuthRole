<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $table = 'kpi';
    protected $fillable= ['id_kpi','kode_kpi','start_date','end_date','nama_kpi','description','polaritas','rumus','satuan','dokumen'];

    public function Target_kerja ()
    {
        return $this->hasMany(Target_kerja::class);
    }
}
