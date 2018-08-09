<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice_photo extends Model
{
    protected $table='notice_photo';
    protected $fillable=['notice_id', 'fileimage'];
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
