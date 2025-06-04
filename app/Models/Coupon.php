<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\support\str;
use Carbon\Carbon;

class coupon extends Model
{
    use HasFactory;

    protected $fillable = ['name','discount','valid_until'];

    public function serNameAttribute($value) {
        $this->attributes['name'] = str::upper($value);
    }

    public function checkIfValid(){
        if($this->valid_until > Carbon::now()){
            return true;
        }else{
            return false;
        }
    }
}
