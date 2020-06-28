<?php

namespace App\Http\Controllers;

use App\Client;
use App\Escaparate;
use App\Clients\Inmovilla;
use App\RequestClient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscaparateController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escaparates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $escaparates = Escaparate::all();
        $request_client = $client->request_client()->where('user_id',Auth::user()->id)->get();
        return view('escaparates.create',compact('client','request_client','escaparates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function previous(Request $request)
    {

        $escaparate = Escaparate::Where('id', $request->escaparate_id)->first();
        $view = $escaparate->view();
        $referer = $request->headers->get('referer');
        if ($request->request_client_id) {
            $request_client = RequestClient::where('id',$request->request_client_id)->first();
            $referer = 'inmovilla';
        }
        $data  = $escaparate->make($referer);
        return view($view, compact('data'));
    }
}
