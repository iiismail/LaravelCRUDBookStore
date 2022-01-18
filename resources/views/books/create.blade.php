@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24"> 
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Add Book
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/books" method="POST">
            @csrf
            <div class = "block">
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="title"
                placeholder="Book Title...">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="author"
                placeholder="Author...">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="description"
                placeholder="Description...">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="publisher"
                placeholder="Publisher...">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="published"
                placeholder="Publication date...">

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection