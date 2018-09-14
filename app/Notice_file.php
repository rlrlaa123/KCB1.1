<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice_file extends Model
{
    protected $table='notice_file';
    protected $fillable=['notice_id', 'file'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function notice(){
        return $this->belongsTo(Notice::class);
    }
    public function noticesdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
