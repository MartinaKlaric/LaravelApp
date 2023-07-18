<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;


class MediaController extends Controller
{
    public function index()
    {
        Gate::authorize('list-media');

        if (View::exists('media.index')) {
            return view('media.index', [
                'data' => ['cd', 'dvd']
            ]);
        }

        return 'View does not exist!';
    }

    public function show(string $name)
    {
        Gate::authorize('show-media');
        dd($name);
    }

    public function create()
    {
        return view('media.create');

    }

    public function store(StoreMediaRequest $request)
    {
        dd(
            $request->validated(),
            $request->safe(),
        );
    }

    public function update(int $id)
    {
        dd($id);
    }
}







        


    
