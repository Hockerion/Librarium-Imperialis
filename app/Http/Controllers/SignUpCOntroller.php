<?php

namespace App\Http\Controllers;
use App\Models\Librarian;
use Illuminate\Http\Request;
use IlluminateDatabaseEloquentModel;

class SignUpCOntroller extends Controller
{
    public function index(){
        return view('SignIn');
    }

    public function storage(Request $request)
        {
            $Librarian = new Librarian;
            $Librarian->USERID = $request->BOOK_ID;
            $Librarian->Name = $request->Name;
            $Librarian->Username = $request->Username;
            $Librarian->Password = $request->Password;
            $Libro->save();
        }
}

