@extends('layouts.app')

@section('content')
    <div class = "m-auto w-4/5 py-24" >
        <div class = "text-center">
            <h1 class = "text-5xl uppercase bold">Books</h1>
        </div>

        @if (Auth::user())

            <div class="pt-10"> 
                <a 
                href="books/create"
                class="border-b-2 pb-2 border-dotted italic text-gray-500"> 
                Add a new book &rarr;
                </a>
            </div>
            @else
                <p class = py-12 italic>Please login to add books</p>
            
        @endif


        <div class = "w-5/6 py-10">

            @foreach ($books as $book)
                <div class ="m-auto">
                    @if (isset(Auth::user()->id) && Auth::user()->id == $book->user_id)
                        <div class="float-right">
                            <a 
                            class="border-b-2 pb-2 border-dotted italic text-green-500"
                            href="books/{{ $book->id }}/edit">
                            Edit &rarr;
                            </a>

                            <form action="/books/{{ $book->id }}" method="POST" class="pt-3">
                                @csrf
                                @method('delete')
                                <button 
                                    type="submit"
                                    class="border-b-2 pb-2 border-dotted italic text-red-500">
                                    Delete &rarr; 
                                </button>
                            </form>
                        </div>
                        
                    @endif
                    
                    <span class = "uppercase text-blue-500 font-bold text-xs italic">
                        Author: {{ $book->author }}
                    </span>

                    <h2 class = "text-gray-700 text 5xl font-bold">{{ $book->title }}</h2>

                    <p class = "text-lg text-gray-700 py-6">
                        {{ $book->description }}

                    </p>

                    <hr class = "mt-4 mb-8">
                </div>
            @endforeach
            

        </div>
    </div>
@endsection