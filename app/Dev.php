<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{
    protected $table='development';
    protected $fillable=['dev_title', 'dev_initiated_log', 'dev_initiated_date', 'dev_fileimage','dev_comment',
        'dev_thumbnails', 'dev_type', 'dev_charge', 'dev_status','location',
        'dev_method', 'dev_area', 'dev_applied_law','dev_publicly_starting_date', 'dev_future_plan', 'dev_reference'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function devdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
