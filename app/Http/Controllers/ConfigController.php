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
    public function typeparcs()
    {
        return view('configs.typeparcs');
    }
    public function parcs()
    {
        return view('configs.parcs');
    }
    public function engins()
    {
        return view('configs.engins');
    }
    public function typepannes()
    {
        return view('configs.typepannes');
    }
    public function pannes()
    {
        return view('configs.pannes');
    }
    public function typelubrifiants()
    {
        return view('configs.typelubrifiants');
    }
    public function lubrifiants()
    {
        return view('configs.lubrifiants');
    }
    public function typeporganes()
    {
        return view('configs.typeporganes');
    }
    public function organes()
    {
        return view('configs.organes');
    }
}
