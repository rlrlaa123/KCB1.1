<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table='policies';
    protected $fillable=['p_title', 'p_content','p_fileimage','dash_id','p_date'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function pdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
