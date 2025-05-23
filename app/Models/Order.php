<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'reference_number',
        'status',
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
