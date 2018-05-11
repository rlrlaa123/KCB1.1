<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchType extends Model
{
    protected $table='search_type';
    protected $fillable=['search_type', 'search_type_id'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
