<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table='report';
    protected $fillable=['report_user_email','report_title', 'report_content', 'report_password', 'report_date'];
    protected $hidden = ['password', 'remember_token',];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function report_detailed(){
        return $this->hasMany(Detailed::class);
    }
}
