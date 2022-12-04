<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_keluar extends Model
{
   protected $table = "tb_surat_keluar";
   protected $primaryKey = "id_suratkeluar";
   protected $fillable = [
    "tanggalmasuk_suratkeluar", "kode_suratkeluar","tipe", 
    "nomor_suratkeluar", "tanggalsurat_suratkeluar", "pengirim", "kepada_suratkeluar", 
    "perihal_suratkeluar", "file_suratkeluar", "operator" ];

}

