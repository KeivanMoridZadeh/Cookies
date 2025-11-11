<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookiesController extends Controller
{
    public function index()
    {
        return view('cookies');
    }
    public function show($id){
        return view('cooky-details', ['id' => $id]);
    }
}
