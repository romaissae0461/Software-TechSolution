<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechSol extends Model
{
    use HasFactory;

    // Explicitly define the table name, because i get error 1146
    protected $table = 'techsols';
    protected $fillable= ['name', 'support_informations','version', 'editor', 'qualification_statut', 'rfc_number', 
    'qualification_date', 'update_date', 'responsable_cit', 'adm', 'mot_clef','category_id', 
     'os_compatibility', 'euc', 'kb_num', 'comment'];

    public function documentations()
    {
        return $this->hasMany(Document::class);
    }
}
