<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        return view('chirps', [
            'pageTitle' => 'Chirp'
        ]);
    }
}
