<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Resources\Library; 
use App\Models\Library;

class LibraryController extends Controller
{
    public function index(){
        $books = Library::all();
        return view('library.index', compact('books'));
    }

    public function show (Library $book){
        return view('library.show', compact('book'));
    }  

    public function update(Request $request, Library $book){
        $book->update($request->all());
        return redirect()->route('library.show', $book->id);
    }

    public function delete(Library $book){
        $book->delete();
        return redirect()->route('library.index');
    }


}
