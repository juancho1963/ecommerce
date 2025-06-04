<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Review extends Model
{
      use HasFactory;

    protected $fillable =['title','body','rating',
                            'approved','user_id','producto_id'];

    public function user() {
        return $this->belongsTo(User::class);   //relacion 1 a 1
    }

    public function producto() {
        return $this->belongsTo(Producto::class); //relacion 1 a 1
    }

    public function getCreatedAttribute($value) {  //metodo para formatear la fecha
        return Carbon::parse($value)->diffeForHumans();
    }
}
