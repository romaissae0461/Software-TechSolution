<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Software extends Model
{
    //$fillable allows mass assignment, like when using: Software::create($validated);
    protected $fillable= ['name', 'function', 'version', 'editor', 'qualification_statut', 'rfc_number', 
    'end_of_life', 'qualification_date', 'update_date', 'responsable_cit', 'adm', 'mot_clef','category_id', 
     'os_compatibility', 'languages', 'master_integration', 'type', 'method_installation', 
    'source', 'sms', 'time_insta', 'arp_full_name', 'exe_file_path', 'complexity', 'criticite', 'prerequis','euc','kb_num','comment'];

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

    protected $attributes = [
        'time_insta' => 2,
        'os_compatibility'=>"Windows 10",
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

  
    public function supportLevel()
    {
        return $this->belongsTo(SupportLevel::class);
    }
    public function documentations()
    {
        return $this->hasMany(Document::class);
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
