<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_karyawan extends Model
{
    protected $table = "data_karyawan";
    protected $fillable= ['id_employee','nik_id','nama','divisi','direktorat','alamat','email','no_tlp'];

    public function employee ()
{
    return $this->hasOne('App\Models\User', 'nik_id');
}

}

