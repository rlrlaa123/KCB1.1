<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asking extends Model
{
    protected $table='asking';
    protected $fillable=['asking_user_email','asking_title', 'asking_content', 'asking_password', 'asking_date'];
    protected $hidden = ['password', 'remember_token'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function asking_detailed(){
        return $this->hasMany(Detailed::class);
    }
}
