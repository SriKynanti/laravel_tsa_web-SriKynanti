<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = 'Nim';

    protected $fillable = [
        'Nim',
        'Nama',
        'Kelas',
        'Jurusan',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
