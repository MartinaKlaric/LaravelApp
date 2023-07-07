<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class MediaController
{
    public function index(Request $request)
    {  dd($request->route());
        return ['cd', 'dvd'];  
    }

    public function show(string $name)
    {  dd($name);
    }

    public function showById(int $id)
    {
        dd($id);
    }

}







        


    
