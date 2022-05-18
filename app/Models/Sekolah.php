<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    public $table = "sekolah";
    protected $fillable = [
        'i_nama', 'i_alamat',
        'i_email','i_notelp',
        'i_foto'
    ];
}
