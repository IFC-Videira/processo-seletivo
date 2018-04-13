<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $fillable =[
        'name',
    ];

    public $rules =[
        'name' => 'required|min:3|max:100'

    ];

    public function selectiveProcess() {
        return $this->belongsToMany('App\Models\SelectiveProcess')->withPivot('vacancy');
    }

    public function subscription() {
        return $this->HasMany('App\Models\Subscription')->withPivot('vacancy');
    }
}
