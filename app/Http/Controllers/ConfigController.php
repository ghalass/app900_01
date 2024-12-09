<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        return view('configs.index');
    }
    public function sites()
    {
        return view('configs.sites');
    }
}