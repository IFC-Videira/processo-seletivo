<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectiveProcess extends Model
{

    protected $fillable =[   
        'name',
        'start_date',
        'end_date',
        'active',
        'description',
        'course_id',
        'quotas_id'
    ];

    public $rules =[
        'name' => 'required|min:3|max:100',
        'start_date' => 'required|date|before:end_date',
        'end_date' => 'required|date|after:start_date',
        'description' => 'required|min:3|max:100'

    ];

    
    public function subscription()
    {
      return $this->hasMany('App\Models\Subscription');
    }

    public function courses() {
        return $this->belongsToMany('App\Models\Course')->withPivot('vacancy')->withTimestamps();
    }

    public function quotas() {
        return $this->belongsToMany('App\Models\Quota')->withPivot('vacancy')->withTimestamps();
    }
}