<?php

namespace App\Http\Controllers;

use App\Client;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('properties.index',compact('clients'));
    }
}
