<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Resources\Library; 
use App\Models\Library;

use function PHPSTORM_META\map;

class LibraryController extends Controller
{
    // write a function called getLibraryIds that returns a JSON array of all the library ids
    public function getLibraryIds()
    {
        $libraryIds = Library::all()->map(function ($library) {
            return $library->id;
        });

        return response()->json($libraryIds);
    }

    // write a function called getLibrary that returns a library based on it's id in JSON format
    public function getLibrary($id)
    {
        $library = Library::find($id);

        return response()->json($library);
    }

    // public function show (Library $book){
    //     return view('library.show', compact('book'));
    // }  

    
    
   

    // write a function called deleteLibrary that deletes a library based on it's id in JSON format if there isnt any quantity of the library it will return a 404 error    
    public function deleteLibrary($id)
    {
        $library = Library::find($id);

        if (!$library) {
            return response()->json([
                "message" => "Library not found"
            ], 404);
        }

        $library->delete();

        return response()->json([
            "message" => "Library deleted"
        ], 200);
    }

    //write a function called createLibrary that creates a new library based on the JSON data sent in the request body and returns the new library in JSON format
    public function createLibrary(Request $request)
    {
        $fields = $request->validate([
            "author" => "required",
            "title" => "required",
            "quantity" => "required",
        ]);

        $library = Library::create($fields);

        return response()->json($library, 201);
    }
    

    //write a function called updateLibrary that updates a library based on it's id in JSON format if there isnt a library with the same id it will return a 404 error  
    public function updateLibrary(Request $request, $id)
    {
        $library = Library::find($id);

        if (!$library) {
            return response()->json([
                "message" => "Library not found"
            ], 404);
        }

        $library->update($request->all());

        return response()->json($library);
    }

}
