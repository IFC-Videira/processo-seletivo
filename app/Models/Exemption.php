<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemption extends Model
{
    protected $fillable =[
        
                'homologated',
                'reason',
                'subscription_id'
                
            ];


    public $rules =[
        'homologated' => 'required',
        'reason' =>'required|min:3|max:100'

    ];


    public function subscription()
    {
      return $this->BelongsTo('App\Models\Subscription');
    }
}
