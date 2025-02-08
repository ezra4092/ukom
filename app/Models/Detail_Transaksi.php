<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_transaksi';
    public $timestamps = false;
    protected $fillable = [
        'id_transaksi',
        'id_paket',
        'qty',
        'keterangan',
    ];

    public function paket(){
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }
    
}
