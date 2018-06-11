<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judicial extends Model
{
    protected $table='Judicial';
    protected $fillable=['j_title', 'j_content', 'j_fileimage','dash_id','j_date'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function jdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
