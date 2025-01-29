<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterAutoPilot extends Model
{
    protected $table = 'master_autopilot';
    protected $fillable= ['name', 'function', 'update_date', 'euc', 'ritm', 'filemaster'];
}
