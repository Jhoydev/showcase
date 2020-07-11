<?php

namespace App\Http\Controllers;

use App\Imports\KyeroImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class TestController extends Controller
{
    public function index()
    {

        dd($xml);

        dd($user);

    }
}
