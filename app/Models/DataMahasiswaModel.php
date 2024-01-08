<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table        = "mahasiswa";
    protected $primaryKey   = "id_nim";
    protected $fillable     = ['id_nim','nim','nama','tanggal_lahir','tempat_lahir'];
}