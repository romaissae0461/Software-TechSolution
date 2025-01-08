<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechSol extends Model
{
    use HasFactory;

    // Explicitly define the table name, because i get error 1146
    protected $table = 'techsols';
    protected $fillable= ['name', 'support_informations'];
}
