<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documentation';
    protected $fillable=['titre','description','file_path','software_id', 'techsol_id']; 
    public function software()
    {
        return $this->belongsTo(Software::class);
    }
    public function techsol()
    {
        return $this->belongsTo(TechSol::class);
    }
}
