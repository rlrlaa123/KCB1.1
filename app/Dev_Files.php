<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev_Files extends Model
{
    protected $table='dev_files';
    protected $fillable=['dev_id', 'fileimage'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function notice(){
        return $this->belongsTo(Dev::class);
    }
    public function noticesdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
