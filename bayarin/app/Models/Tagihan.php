<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = ['nasabah_id', 'nomor_tagihan', 'jumlah_tagihan', 'status_pembayaran'];
}
