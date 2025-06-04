<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['qty', 'total', 'delivered_at', 'user_id', 'coupon_id'];

    public function productos() {
        return $this->belongsToMany(Producto::class); //metodo mucho a muchos
    }

    public function user() {
        return $this->belongsTo(User::class); //uno a muchos inversa
    }

    public function coupon() {
        return $this->belongsTo(coupon::class); //uno a muchos inversa
    }
}
