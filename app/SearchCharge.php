<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchCharge extends Model
{
    protected $table='search_charge';
    protected $fillable=['search_charge', 'search_charge_id'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
