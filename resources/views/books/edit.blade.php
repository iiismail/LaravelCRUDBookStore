@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24"> 
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Update Book
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/books/{{ $book->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class = "block">
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="title"
                value="{{ $book->title }}">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="author"
                value="{{ $book->author }}">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="description"
                value="{{ $book->description }}">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="publisher"
                value="{{ $book->bookPublisher->name }}">

                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="published"
                value="{{ $book->publisherDate->published }}">

                <label for="categories">Update Category:</label>
                <select name="categories" id="categories" onchange="checkvalue(this.value)">
                  
                    @foreach ( $categories  as $category) --}}
                    <option value={{ $category->name }}>{{ $category->name }}</option> 
                        
                   
                    @endforeach
                    <option value="Other...">Create New</option>
                </select>
                <br><br>
                 <input 
                type="text" id="other_text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="CreateNew" placeholder="Create New Category">


                <script>
                    document.getElementById('other_text').style.display='none';
                    function checkvalue(val)
                    {
                        if(val==="Other...")
                        document.getElementById('other_text').style.display='block';
                        else
                        document.getElementById('other_text').style.display='none'; 
                    }
                </script>

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection