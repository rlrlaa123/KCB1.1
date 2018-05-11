<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FYI extends Model
{
    protected $table='FYI';
    protected $fillable=['fyi_title', 'fyi_content', 'fyi_fileimage', 'fyi_date'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function FYIdetailed(){
        return $this->hasMany(Detailed::class);
    }
}
