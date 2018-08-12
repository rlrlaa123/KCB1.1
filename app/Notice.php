<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table='notices';
    protected $fillable=['notice_title', 'notice_content', 'classification', 'location', 'notice_date'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function noticesdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
