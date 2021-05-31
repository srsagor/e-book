<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EBook;
use App\Models\ItemType;

class BookListController extends Controller
{
     public function index(Request $request)
    {
        // dd($request->toarray());
        if($request->search_type == 1)
        {
            $allBooks = EBook::where('title','=',$request->search)->paginate(6);
        }
         else if($request->search_type == 2)
        {
            $allBooks = EBook::where('title','=',$request->search)->paginate(6);
        }
         else if($request->search_type == 3)
        {
            $allBooks = EBook::where('title','=',$request->search)->paginate(6);
        }
         else if($request->search_type == 4)
        {
            $allBooks = EBook::where('title','=',$request->search)->paginate(6);
        }
         else if($request->search_type == 5)
        {
            $allBooks = EBook::where('title','=',$request->search)->paginate(6);
        }
         else{
            $allBooks = EBook::paginate(6);
        }
        
        return view('booklist', compact('allBooks','request'));
       
    }
    public function details($id)
    {
         $Bookinfo = EBook::find($id);
         return view('bookdetails', compact('Bookinfo'));
    }
}
