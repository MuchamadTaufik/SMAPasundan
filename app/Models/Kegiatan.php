<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jenis_kegiatans()
    {
        return $this->belongsTo(JenisKegiatan::class);
    }

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}
