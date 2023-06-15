<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    public function user(){
        return $this::hasOne(User::class);
    }
    public function offer(){
        return $this::hasOne(Offer::class);
    }
}
