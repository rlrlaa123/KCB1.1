<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'library';
    protected $fillable = ['library_title', 'library_content', 'library_fileimage', 'library_date'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function librarydetailed()
    {
        return $this->hasMany(Detailed::class);
    }
}
