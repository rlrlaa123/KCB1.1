<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsefulWebsite extends Model
{
    protected $table='useful_website';
    protected $fillable=['organization', 'website_address'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
