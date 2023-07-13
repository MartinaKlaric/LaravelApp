<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\View;


class MediaController extends Controller
{
    public function index()
    {  
        if(View::exists('media.index')){
            return view('media.index', ['data'=> ['cd', 'dvd']]);
        }                                              
        return 'View does not exist!';
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








        


    
