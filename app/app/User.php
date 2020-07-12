<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
        'mobile', 'address', 'cp', 'web',
        'logo','properties_limit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createRequestClient(Client $client, $request)
    {
        Property::create([
            'request' => json_encode($request->all()),
            'title' => $request->ref,
            'client_id' => $client->id,
            'user_id' => $this->id

        ]);
    }

    public function request_client()
    {
        return $this->hasMany('App\Property');
    }
}
