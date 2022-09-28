<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;
use IlluminateDatabaseEloquentModel;

class BookController extends Controller
{

    public function storage(Request $request)
        {
            $Libro = new Libro;
            $Libro->BOOK_ID = $request->BOOK_ID;
            $Libro->BOOK_TITLE = $request->BOOK_TITLE;
            $Libro->Author = $request->Author;
            $Libro->Year = $request->Year;
            $Libro->Volume = $request->Volume;
            $Libro->save();
        }

    public function index()
    {
        return view('Book');
    }

    public function update(){
        $Libro = Libro::find(2);
        $Libro->rank_level = 4;
        $Libro->save();
    }

    public function destroy(){
        Libro::destroy(2);
    }
}
