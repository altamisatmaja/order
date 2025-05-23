<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'deskripsi',
        'nama_produk',
        'harga_produk',
    ];

    public function orderDetails(){
        return $this->hasOne(Order::class, 'order_id');
    }
    
}
