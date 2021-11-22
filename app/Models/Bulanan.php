<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Bulanan extends Model
{
    protected $table = "tbl_bulanan";
    protected $fillable= ['id_bulanan','id_settarget_kerja','januari','februari', 'maret','april','mei','juni','juli','agustus','september','november','desember'];

    public function Target_kerja ()
    {
        return $this->hasMany(Target_kerja::class);
    }
}

