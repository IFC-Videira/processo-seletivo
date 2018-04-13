<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =[        
        
        'date',
        'rg',
        'rgemitter',
        'cpf',
        'sex',
        'namefather',
        'namemother',
        'passport',
        'naturaless',
        'phone',
        'mobile',
        'scholarity',
        'user_id'
    ];
    public $rules =[
        'date' => 'required|date|before:today',
        'rg' => 'required|numeric|min:3',
        'rgemitter' => 'required|min:3',
        'cpf' => 'required|numeric|min:3',
        'sex' => 'required',
        'namefather' => 'required|min:3|max:100',
        'namemother' => 'required|min:3|max:100',
        'passport' => 'required|min:3|max:100',
        'naturaless' => 'required|min:3|max:100',
        'phone' => 'required|min:3|max:100',
        'mobile' => 'required|min:3|max:100',
        'scholarity'  => 'required'

    ];

    public function specialNeeds() {        
        return $this->belongsToMany('App\Models\SpecialNeed')->withPivot('permanent','observation')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    
    public function address() 
    {
        return $this->hasOne('App\Models\Address');
    }
}
