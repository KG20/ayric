<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return view('home', ['title' => 'Ayric Home']);
    }
}
