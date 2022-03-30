<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LibraryController;
use App\Models\Library;
use App\Models\Transaction;


class TransactionController extends Controller
{
//create a function when a book is extracted from the library
    public function extractBook(Request $request)
    {
        $library = Library::find($request->librarycode);
        $library->stock = $library->stock - 1;
        $library->save();
        $transaction = new Transaction;
        $transaction->librarycode = $request->librarycode;
        $transaction->membercode = $request->membercode;
        $transaction->save();
        return response()->json(['message' => 'Book extracted from library']);
    }
}
