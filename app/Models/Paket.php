<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'tb_paket';
    public $timestamps = false;
    protected $fillable = [
        'jenis',
        'nama_paket',
        'harga',
        'id_outlet',
    ];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id');
    }
}
