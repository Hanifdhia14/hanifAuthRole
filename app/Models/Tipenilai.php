<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipenilai extends Model
{
    protected $table= 'tipenilai1';
    protected $fillable= ['kode_nilai', 'tipe_penilaian',];
}
