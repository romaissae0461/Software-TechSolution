<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documentation';
   protected $fillable=['titre','description','file_path']; 
}
