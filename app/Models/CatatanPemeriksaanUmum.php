<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPemeriksaanUmum extends Model
{
    use HasFactory;
    protected $table = "catatan_perawatan_umum";
    protected $guarded = [];
}
