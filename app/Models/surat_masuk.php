<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_masuk extends Model
{
   protected $table = "tb_surat_masuk";
   protected $primaryKey = "id_suratmasuk";
   protected $fillable = [
    "tanggalmasuk_suratmasuk", "kode_suratmasuk","tipe", 
    "nomor_suratmasuk", "tanggalsurat_suratmasuk", "pengirim", "kepada_suratmasuk", 
    "perihal_suratmasuk", "file_suratmasuk", "operator" ];

}

