<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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


    //To store the name of user after authentication
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::check() ? Auth::user()->name : 'System';
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::check() ? Auth::user()->name : 'System';
        });
    }
}
