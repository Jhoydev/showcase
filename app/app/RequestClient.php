<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestClient extends Model
{
    protected $fillable = ['title','request','client_id','user_id'];
    protected $table = 'request_client';

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
