<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RmDony extends Model
{
    use HasFactory;

    protected $table = "rm_drg_dony";
    protected $guarded = [];
    protected $primaryKey = "no_pasien";
    protected $keyType = "string";

}
