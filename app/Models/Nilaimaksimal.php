<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilaimaksimal extends Model
{
    protected $table = 'nilaimax';
    protected $fillable= ['kode_nmax', 'nilai_maksimal',];
}
