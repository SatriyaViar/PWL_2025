<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = "m_kategori";
    protected $primaryKey = "kategori_id";

   //untuk mengizinkan mass assignment
    protected $fillable = ['kategori_kode', 'kategori_nama'];
    
}
