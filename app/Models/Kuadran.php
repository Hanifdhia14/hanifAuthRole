<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuadran extends Model
{
    protected $table = 'kuadran1';
    protected $fillable= ['kode_kuadran', 'kuadran', 'start_date', 'end_date'];
}
