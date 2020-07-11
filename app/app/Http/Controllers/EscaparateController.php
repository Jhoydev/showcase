<?php

namespace App\Http\Controllers;

use App\Client;
use App\Clients\ClientFactory;
use App\Escaparate;
use App\Clients\Inmovilla;
use App\Property;
use App\Uploaders\UploadFactory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscaparateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('escaparates.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $escaparates = Escaparate::all();
        $request_client = Property::where('user_id', Auth::user()->id)->get();
        return view('escaparates.create', compact('request_client', 'escaparates'));
    }


    public function previous(Request $request)
    {

        $escaparate = Escaparate::Where('id', $request->escaparate_id)->first();
        $view = $escaparate->view();

        if ($request->request_client_id) {
            $request_client = Property::where('id', $request->request_client_id)->first();
            $referer = $request_client->client->name;
            $data  = $escaparate->make($referer);
            return view($view, compact('data'));
        }
        return abort(404);
    }

    public function uploadXML(Request $request)
    {
        $client = Client::where('id', $request->client_id)->first();
        $uploader = UploadFactory::make($client);
        $uploader->uploadXML($request->file('file'));


        $data = $uploader->storeJson($client, Auth::user());

        return response()->json($data);

    }
}
