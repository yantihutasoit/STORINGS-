<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $table = "siswa";
    protected $fillable = [
        's_nis','s_nama', 's_nama_ortu', 's_tempat_lahir',
        's_tgl_lahir','s_alamat',
        's_gender','s_kelas','s_semester'
    ];
}
