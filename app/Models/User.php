<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'city',
        'zip_code',
        'country',
        'phone_number',
        'profile_image',
        'profile-completed'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
        //funcion ordenes del usuario 1:n
    public function orders() {
        return $this->hasMany(Order::class) //metodo uno a muchos
            ->with('productos')
            ->latest(); //organizar por fecha
    }

    //funcion devolve url y foto del perfil del usuario
    public function image_path() {
        if($this->profile_image) {
            return asset('storage/images/users'.$this->profile_image);
        }else{
            return 'https://img.icons8.com/?size=100&id=13042&format=png&color=000000';
        }
    }
}
