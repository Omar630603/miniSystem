<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nomor_induk',
        'tanggal_cuti',
        'lama_cuti',
        'tanggal_lahir',
        'keterangan',
    ];
}
