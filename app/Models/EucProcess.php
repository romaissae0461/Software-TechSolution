<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EucProcess extends Model
{
    protected $table = 'euc_process';
    protected $fillable= ['name', 'file_chem'];
}
