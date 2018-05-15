<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedNews extends Model
{
    protected $table='RelatedNews';
    protected $fillable=['rn_title', 'rn_content', 'rn_fileimage','rn_dash_id', 'rn_date', 'rn_link'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function rndetailed(){
        return $this->hasMany(Detailed::class);
    }
}
