<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmUmum extends Model
{
    use HasFactory;

    protected $table = "rm_umum";
    protected $guarded = [];
    protected $primaryKey = "no_pasien";
    protected $keyType = "string";

}
