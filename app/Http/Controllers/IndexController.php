<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', ['api_key' => config('app.api_key')]);
    }
}
