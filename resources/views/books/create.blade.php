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

                

                

                <label for="categories">Choose a category:</label>
                <select name="categories" id="categories" onchange="checkvalue(this.value)">
                  
                    @foreach ( $categories  as $category) 
                    <option value={{ $category->name }}>{{ $category->name }}</option> 
                        
                   
                    @endforeach
                    <option value="Other...">Create New</option>
                </select>
                <br><br>
                 <input 
                type="text" id="other_text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="CreateNew" placeholder="Enter New Category">


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

<label for="categories">Choose a category:</label>
<select name="categories" id="categories" onchange="checkvalue(this.value)">
  
    @foreach ( $categories  as $category) 
    <option value={{ $category->name }}>{{ $category->name }}</option> 
        
   
    @endforeach
    <option value="Other...">Create New</option>
</select>
<br><br>
 <input 
type="text" id="other_text"
class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
name="CreateNew" placeholder="Enter New Category">


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

 <label for="categories">Choose a category:</label>
                <select name="categories" id="categories" onchange="checkvalue(this.value)">
                  
                    @foreach ( $categories  as $category) 
                    <option value={{ $category->name }}>{{ $category->name }}</option> 
                        
                   
                    @endforeach
                    <option value="Other...">Create New</option>
                </select>
                <br><br>
                 <input 
                type="text" id="other_text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="CreateNew" placeholder="Enter New Category">


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

        @if($errors->any())
            @foreach ($errors->all() as $error)
            <li>
                {$error}
            </li>
                
            @endforeach
        @endif
        
    </div>
    
                @livewireScripts
</body>
@endsection