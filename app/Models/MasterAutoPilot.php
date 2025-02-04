<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MasterAutoPilot extends Model
{
    protected $table = 'master_autopilot';
    protected $fillable= ['name', 'function', 'update_date', 'euc', 'ritm', 'filemaster'];

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
