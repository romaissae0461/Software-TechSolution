<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    //$fillable allows mass assignment, like when using: Software::create($validated);
    protected $fillable= ['name', 'function', 'version', 'editor', 'qualification_statut', 'rfc_number', 
    'end_of_life', 'qualification_date', 'update_date', 'responsable_cit', 'adm', 'mot_clef','category_id', 
    'service_id', 'os_compatibility', 'languages', 'master_integration', 'type', 'method_installation', 
    'source', 'sms', 'time_insta', 'arp_full_name', 'exe_file_path', 'complexity', 'criticite', 'prerequis'];

    //without $casts, languages will be returned as a row of strings and not array, same for dates and booleans
    //they will be strings, with $casts laravel turns 'em to php types 
    protected $casts=[
        'languages'=>'array',//convets it to array
        'end_of_life'=>'date',//converts it to Carbon
        'qualification_date'=>'date',
        'update_date'=>'date',
        'master_integration'=>'boolean',//converts it to true/false
        'sms'=>'boolean',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function supportLevel()
    {
        return $this->belongsTo(SupportLevel::class);
    }
}
