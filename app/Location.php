<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table='dev_location';
    protected $fillable=['dev_city', 'dev_district'];
    public $timestamps = false;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
