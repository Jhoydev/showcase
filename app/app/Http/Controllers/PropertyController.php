<?php

namespace App\Http\Controllers;

use App\Client;
use App\Clients\ClientFactory;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $properties = Property::where('user_id',Auth::user()->id)->get();
        return view('properties.index',compact('clients','properties'));
    }

    public function uploadXML(Request $request)
    {
        $client = Client::where('id', $request->client_id)->first();
        $uploader = ClientFactory::make($client);
        $uploader->uploadXML($request->file('file'));
        $uploader->storeJson($client, Auth::user());

        return back();
    }
}
