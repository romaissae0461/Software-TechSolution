<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = ['titre', 'contenu', 'views'];


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
