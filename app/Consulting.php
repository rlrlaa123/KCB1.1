<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulting extends Model
{
    protected $table = 'consulting';
    protected $fillable = ['consulting_title', 'consulting_fileimage', 'consulting_date'];

}
