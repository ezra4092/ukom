<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    public $timestamps = false;
    protected $fillable = [
        'id_outlet',
        'kode_invoice',
        'id_member',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'biaya_tambahan',
        'diskon',
        'pajak',
        'status',
        'dibayar',
        'total',
        'id_user',
    ];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id');
    }

    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
