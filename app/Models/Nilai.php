<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nilai extends Model
{
    public $table = "nilai";
    protected $fillable = ['n_nis',
        'n_agama', 'n_pkn',
        'n_bindo', 'n_bing',
        'n_ipa', 'n_ips',
        'n_mtk', 'n_sbk',
        'n_penjas',
        'kkm','n_nama', 'n_nama_ortu'
    ];
}

