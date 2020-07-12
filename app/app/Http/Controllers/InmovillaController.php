<?php

namespace App\Http\Controllers;

use App\Clients\Inmovilla;
use App\User;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InmovillaController extends Controller
{

    public function store(Request $request,$api_key)
    {

        $referer = $request->headers->get('referer');
        $host = parse_url($referer)['host'];

        $user = User::where('api_key',$api_key)->first();
        $inmovilla = Client::where('name','inmovilla')->first();

        if (Str::contains($host, explode(';', $inmovilla->domain)) && $user->id){

            if ($user->request_client->count() >= 10) {
                return abort(401);
            }

            $uploader = new Inmovilla($inmovilla);
            $uploader->getRequest($request->all());

            $uploader->storeJson($inmovilla, $user);

            return redirect('/home');
        }
        return abort(404);
    }

}
