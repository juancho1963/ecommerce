<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable =['name', 'slug', 'qty',
                            'price', 'desc', 'thumbnail',
                            'first_image', 'second_image',
                            'third_image', 'status'];

    public function colors() {
        return $this->belongsToMany(Color::class); //metodo mucho a muchos
    }

    public function sizes() {
        return $this->belongsToMany(Size::class); //metodo mucho a muchos
    }

    public function orders() {
        return $this->belongsToMany(Order::class); //metodo mucho a muchos
    }

    public function reviews() {
        return $this->hasMany(Review::class)  // muchos a uno
                ->with('user')// usuario que escribio la resena
                ->where('approved', 1)//resenas aprobadas
                ->latest(); //para ordenar las resenas por fecha
    }

    public function getRouteKeyName() {
        return 'slug';  //para buscar un producto especifico
    }


}

