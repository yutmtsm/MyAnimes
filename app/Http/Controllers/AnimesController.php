<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimesController extends Controller
{
    public function top(){
        return view('animes.index');
    }
}

