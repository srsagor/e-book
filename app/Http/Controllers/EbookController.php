<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EBook;
use App\Models\ItemType;
use Illuminate\Support\Facades\Storage;
use Datetime;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateImage($files) : string
    {
        $filenameWithExt = $files->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
        $filename = preg_replace("/\s+/", '-', $filename);
        $extension = $files->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        return $fileNameToStore;
    }
    public function index()
    {
        $allBooks = EBook::all();
        return view('backend.ebook.index', compact('allBooks'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemstypes = ItemType::get();
         return view('backend.ebook.create', compact('itemstypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required',
            'volume' => 'required',
            'sub_title' => 'required',
            'series' => 'required',
            'item_type' => 'required',
            'subject_heading' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'issn' => 'required',
            'isbn' => 'required',
            'corporate_author' => 'required',
            'total_page' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'language' => 'required',
            'pdf' => 'required',
            'image' => 'required'
        ]);
         $today = new Datetime();
         $dest_path = 'contents/'.$today->format('Y/').$today->format('F/').$today->format('j/');
         $EBooks = new EBook();
         $EBooks->title=$request->title;
         $EBooks->volume=$request->volume;
         $EBooks->subtitle=$request->sub_title;
         $EBooks->series=$request->series;
         $EBooks->item_type_id=$request->item_type;
         $EBooks->subjec_heading=$request->subject_heading;
         $EBooks->author=$request->author;
         $EBooks->publisher=$request->publisher;
         $EBooks->issn=$request->issn;
         $EBooks->isbn=$request->isbn;
         $EBooks->corporate_autor=$request->corporate_author;
         $EBooks->total_page=$request->total_page;
         $EBooks->price=$request->price;
         $EBooks->language=$request->language;
          $EBooks->save();

        if($files = $request->file('pdf'))
        {
            $fileNameToStore = $this->generateImage($files);
            $folder = '/books/pdf/';
            $filePath = $folder . $fileNameToStore;

            $success = EBook::find($EBooks->id)->update([
                'pdf' => $filePath
            ]);
            
            if($success){
                $request->pdf->move(public_path($folder), $fileNameToStore);
            }
        }
         if($files = $request->file('image'))
        {
            $fileNameToStore = $this->generateImage($files);
            $folder = '/books/image/';
            $filePath = $folder . $fileNameToStore;

            $success = EBook::find($EBooks->id)->update([
                'cover_image' => $filePath
            ]);
            
            if($success){
                $request->image->move(public_path($folder), $fileNameToStore);
            }
        }
        $message = 'upload done';
        
        return redirect('/E-Book/')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
