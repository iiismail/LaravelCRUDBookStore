<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategories;
use App\Models\BookPublisher;
use App\Models\Categories;
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
        $categories = Categories::all();
        
        return view('books.create',[
            'categories' => $categories
        ]); 
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
            'title'=> 'required',
            'author'=> 'required',
            'description'=> 'required',
            'publisher'=> 'required',
            'published'=> 'required',
            

        ]);
        $book = new Book; 
        $publisher = new BookPublisher;
        $published = new PublisherDate; 
        $categories = new Categories; 
        $book_categories = new BookCategories;
         

        
       
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

        

        

        if ($request->input('categories') == 'Other...'){
            $categories->name = $request->input('CreateNew'); 
            $categories->save();
            $categories = Categories::whereRaw('id = (select max(`id`) from categories)')->get();
         } else {
            $categories = Categories::where('name', '=', $request->input('categories'))
                     ->get();
        }
        $book_categories->book_id = $book[0]->id;
        $book_categories->category_id = $categories[0]->id;
        $book_categories->save(); 
        

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

        //var_dump($book->categories);

        //$categories = Categories::find($id); 

        //print_r($categories); 

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
        $categories = Categories::all();
        
       

        return view('books.edit')->with('book', $book)->with('categories', $categories);    
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

        $request->validate([
            'title'=> 'required',
            'author'=> 'required',
            'description'=> 'required',
            'publisher'=> 'required',
            'published'=> 'required|date',
            

        ]);
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
            $book = Book::find($id);
            if ($request->input('categories') == 'Other...'){
                
                
                $categories = Categories::where('id', $book->categories[0]->id)->update([
                    'name' => $request->input('CreateNew'),
    
                ]);
                
             } else {
                $categories = Categories::where('name', '=', $request->input('categories'))
                         ->get();

                $book_categories = BookCategories::where('category_id', $book->categories[0]->id)->update([
                'category_id' => $categories[0]->id,

                ]);
            }
            

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

    public function getNoOfCategories(Request $request)
    {
        
        $result = $request->getNoOfCategories; 
       
        dd($result);
        return response()->json(['result' => $result]); 
    }


}
