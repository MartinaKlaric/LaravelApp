<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryBuilder = DB::table('genres');

        if ($request->boolean('count')) {
            return json_encode(['count' => $queryBuilder->count()]);
        }

        $queryBuilder->select(['name as title']);

        if ($request->boolean('getId')) {
            $queryBuilder->addSelect(['id']);
        }

        if ($nameParameter = $request->input('name')) { //ako nekakav input name postoji
            $queryBuilder->where('name', 'LIKE', '%' . $nameParameter . '%'); //vrati
        }

        //$queryBuilder->oldest()->take(2)->skip(1); //daj 2 najstarija, ali preskoči 1


        return $queryBuilder->get();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('genres')->insert([
            'name' => $request->input('name') //unesi name koji god dobiješ iz requesta
        ]);

        return redirect()->route('genre.index'); //vraćamo ga na gornju akciju (index)
    }

    /**
     * Display the specified resource.
     */
    public function show(int $genre)
    {
        if (DB::table('genres')->where('id', '=', $genre)->doesntExist()) {
            abort(404);
        }

        return DB::table('genres')->find($genre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $genre)
    {
        DB::table('genres')->where('id', $genre)->update(
            ['name' => $request->input('name')]  //koji god ti dam name, ti ga update-aj
        );

        return redirect()->route('genre.show', ['genre' => $genre]); //redirektaj na akciju show 
    }                                             //i kao parametar mu damo upravo id da ga zna prikazati

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $genre)
    {
        DB::table('genres')->where('id', $genre)->delete(); //odi u tablicu zanr, pronadji taj id i obriši

        return redirect()->route('genre.index'); //i onda redirekraj na popis zanrova, odnosno akciju index
    }
}
