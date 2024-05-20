<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        "nip",
        "nama",
        "jenis_kelamin",
        "tempat_lahir",
        "tanggal_lahir",
        "jabatan",
        "no_hp",
        "email",
    ];

    protected $dates = [
        "tanggal_lahir",
    ];
}
