<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Storage;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at','desc')->paginate(5);
        return view('books.index')->withBooks($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'title'=>'required|min:10|max:255',
            'description'=>'required|min:10|max:1000',
            'author'=>'required|min:10|max:255',
            'pages'=>'required|numeric|min:1|',
            'publish_date'=>'required|date_format:Y-m-d',
            'file'=>'required|file|mimetypes:application/pdf|max:10000',
            'cover_image'=>'required|image|mimes:jpeg,jpg,png|max:5000',
            'series_title'=>'nullable|',
            'series_no'=>'numeric|nullable'

        ));
        if($request->hasFile('file')){
            $filenameWithExtension = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/uploads',$filenameToStore);
        }

        if($request->hasFile('cover_image')){
            $imageWithExtension = $request->file('cover_image')->getClientOriginalName();
            $imagename = pathinfo($imageWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $imageToStore = $imagename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_image',$imageToStore);
        }

        $book = new Book;

        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->pages = $request->pages;
        $book->publish_date = $request->publish_date;
        $book->file = $filenameToStore;
        $book->cover_image = $imageToStore;
        $book->series_title = $request->series_title;
        $book->series_no = $request->series_no;

        $book->save();

        // return redirect()->route('books.index')->with('success','new book added to the library');
        return redirect()->route('books.index')->with('success',$book->title.'added to the catalog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->withBook($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit')->withBook($book);
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
        $book = Book::find($id);
        $this->validate($request, [
            'title'=>'required|min:10|max:255',
            'description'=>'required|min:10|max:1000',
            'author'=>'required|min:10|max:255',
            'pages'=>'required|numeric|min:1|',
            'publish_date'=>'required|date_format:Y-m-d',
            'file'=>'required|file|mimetypes:application/pdf|max:10000',
            'cover_image'=>'required|image|mimes:jpeg,jpg,png|max:5000',
            'series_title'=>'nullable|',
            'series_no'=>'numeric|nullable'
        ]);

        if($request->hasFile('file')){
            $filenameWithExtension = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/uploads',$filenameToStore);
        }

        if($request->hasFile('cover_image')){
            $imageWithExtension = $request->file('cover_image')->getClientOriginalName();
            $imagename = pathinfo($imageWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $imageToStore = $imagename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_image',$imageToStore);
        }


        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->pages = $request->pages;
        $book->publish_date = $request->publish_date;
        $book->file = $filenameToStore;
        $book->file = $imageToStore;
        $book->series_title = $request->series_title;
        $book->series_no = $request->series_no;

        $book->save();
        return redirect()->route('books.show',$book->id)->with('success',$book->title.' has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        Storage::delete('public/uploads/'.$book->file);
        Storage::delete('public/cover_image/'.$book->cover_image);
        $book->delete();
        return redirect()->route('books.index')->with('success',$book->title.' has been Deleted');

    }
}
