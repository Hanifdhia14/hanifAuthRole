<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kuadran extends Model
{
    protected $table = 'kuadran1';
    protected $fillable= ['id_kuadran','kode_kuadran', 'kuadran', 'start_date', 'end_date'];

    public function Target_kerja ()
{
    return $this->hasMany(Target_kerja::class);
}
}
