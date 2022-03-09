<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Throwable;

class ContatoController extends Controller
{
    public function send(Request $request)
    {   
        try {
            
            dd($request->nome);
        }catch (Exception $e) {
            print_r($e);
    
            return false;
        }
    }
}

