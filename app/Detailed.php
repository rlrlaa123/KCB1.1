<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailed extends Model
{
    protected $fillable=['title','content', 'fileimage','dash_id'];
    public function hotfocus(){
        $this->belongsToMany(HotFocus::class);
    }
    public function relatednews(){
        $this->belongsToMany(RelatedNews::class);
    }
    public function policy(){
        $this->belongsToMany(Policy::class);
    }
    public function judicial(){
        $this->belongsToMany(Judicial::class);
    }
    public function library(){
        $this->belongsToMany(Library::class);
    }
    public function notice(){
        $this->belongsToMany(Notice::class);
    }
}

