<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request){

        //dd = var_dump y die
       //dd($request->query('title','Hola laravel'));
        return view('test', [
            'title'=> $request->query('title','Hola laravel')
        ]);
    }
}
