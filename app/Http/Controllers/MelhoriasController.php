<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MelhoriasController extends Controller
{
    public function index ()
    {
        return view('melhorias.index');
    }
}
