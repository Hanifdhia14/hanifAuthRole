<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee";
    protected $fillable= ['id_employee','nik_id','nama','divisi','direktorat','alamat','email','no_tlp'];

    public function employee ()
{
    return $this->hasOne('App\Models\User', 'nik_id');
}

}
