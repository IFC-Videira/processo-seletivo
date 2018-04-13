<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable =[
        'selective_process_id',
        'user_id', 
        'quota_id',
        'course_id',
        'payment_date',
        'paid',
        'subscription_date'
    ]; 

    public $rules =[
        'payment_date' => 'required|date',
        'paid',
        'subscription_date'

    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

     public function selectiveProcess()
     {
         return $this->belongsTo('App\Models\SelectiveProcess');
     }

     public function quota()
     {
         return $this->belongsTo('App\Models\Quota');
     }

     public function course()
     {
         return $this->belongsTo('App\Models\Course');
     }

     public function exemption()
     {
         return $this->HasMany('App\Models\Exemption');
     }
}