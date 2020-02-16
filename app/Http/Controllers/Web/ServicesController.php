<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ServicesController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () {
        return view('services.services');
    }
}