<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    /**
     * Display the homepage.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }
}
