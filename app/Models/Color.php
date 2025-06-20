<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function productos() {
        return $this->belongsToMany(Producto::class);

    }
}
