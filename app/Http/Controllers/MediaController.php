<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;


class MediaController extends Controller
{
    public function index(Request $request)
    {  
        return response()->caps('foo');
    }

    public function show(string $name) 
    {  
        dd($name);
    }

    public function showById(int $id)
    {
        dd($id);
    }

    public function store(Request $request)
    {
        dd($request->validate(['name'=> ['required']])); 
    }

}








        


    
