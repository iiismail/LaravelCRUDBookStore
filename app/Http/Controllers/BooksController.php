<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; 
use App\Models\BookPublisher;
use App\Models\PublisherDate;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all(); 
        
        return view('books.index', [
            'books' => $books
        ]);
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
        $book = new Book; 
        $publisher = new BookPublisher;
        $published = new PublisherDate;  
        $book->title = $request->input('title'); 
        $book->author = $request->input('author'); 
        $book->description = $request->input('description');
        $book->user_id = auth()->user()->id;
        $book->save(); 

        $book = Book::whereRaw('id = (select max(`id`) from books)')->get();

        $publisher->name = $request->input('publisher');
        $publisher->book_id = $book[0]->id;  
        $publisher->save();
        $publisher = BookPublisher::whereRaw('id = (select max(`id`) from book_publishers)')->get();

        $published->published = $request->input('published');
        $published->publisher_id = $publisher[0]->id; 
        $published->book_id = $book[0]->id;
        $published->save();

        return redirect('/books'); 


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

        return view('books.show')->with('book', $book);
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
        
       

        return view('books.edit')->with('book', $book); 
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
        $book = Book::where('id', $id)->update([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'description'=>$request->input('description'),
                'user_id'=>auth()->user()->id


            ]);

        $publisher = BookPublisher::where('id', $id)->update([
                'name' => $request->input('publisher'),

            ]);

        $publishedDate = PublisherDate::where('id', $id)->update([
                'published' => $request->input('published'),

            ]);

            return redirect('/books');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        

        $book->delete();

        return redirect('/books'); 
    }
}