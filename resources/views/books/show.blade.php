@extends('layouts.app')

@section('content')

<div class = "m-auto w-4/5 py-24" >
    <div class = "text-center">
        <h1 class = "text-5xl uppercase bold">{{ $book->title }}</h1>
    </div>

    <div class = "w-5/6 py-10 text-center">
       
            <div class ="m-auto">
                <span class = "uppercase text-blue-500 font-bold text-xs italic">
                    Author: {{ $book->author }}
                </span>

                <p class = "text-lg text-gray-700 py-6">
                    {{ $book->description }}

                </p>

                <p class ="text-left">
                    Categories this book belongs to:
                    @forelse ($book->categories as $category)
                   <b>{{ $category->name }},</b> 
                        
                    @empty
                        <p>This book has not been assigned to any categories</p>
                    @endforelse
                </p>
                <hr class = "mt-4 mb-8">
            </div>
       
    </div>
</div>

@endsection