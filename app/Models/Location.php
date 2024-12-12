<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

        protected $table = 'locations';
        protected $primarykey = "id";

        // public function user(){
        //     return $this->belongsToMany(User::class,);
        // }

        public function business(){
            return $this->belongsToMany(Business::class,'business_location');
        }
}