<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotFocus extends Model
{
    protected $table='hotfocus';
    protected $fillable=['hf_title', 'hf_content', 'hf_fileimage','dash_id','hf_thumbnails','hf_date'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function hfdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
