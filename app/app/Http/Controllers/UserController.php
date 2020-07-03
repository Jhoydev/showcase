<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UploadImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $user = User::where('id',$id)->firstOrFail();
        $user->update($request->all());


        // Logo
        if ($request->delete_logo == "true") {

            UploadImage::destroy($user->logo);

        } elseif ($request->hasFile('logo')) {

            $path_logo  = 'users/' . $user->id;
            $image = UploadImage::store($path_logo, $request->file('logo'), 'logo', 500);
            $user->logo = $path_logo . '/' . $image->basename;
            $user->update();

        }

        return redirect()->route('home')->with('response','Datos actualizados');
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


    public function generateNewApiKey()
    {
        $user = Auth::user();
        $user->api_key = Str::uuid();
        $user->save();
        return redirect()->route('home')->with('response', 'Se ha generado un nuevo Apikey: ' . $user->api_key);
    }
}
