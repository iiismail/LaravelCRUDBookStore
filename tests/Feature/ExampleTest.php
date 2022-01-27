<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Book; 
use App\Models\User; 

class ExampleTest extends TestCase
{

    
        use RefreshDatabase;
    
        /** @test */
        public function create_book_test()
        {
            $response = $this->postJson(route('book.store'), [
                'name' => "TEST NAME",
                'description' => "TEST DESCRIPTION"
            ]);
    
            $response->assertCreated();
    
            $this->assertEquals('TEST NAME', $response->json()['name']);
            $this->assertEquals('TEST DESCRIPTION', $response->json()['description']);
        }
    
    

    public function delete_book()
    {
         $book = Book::factory()->create([
             'name' => "TEST NAME",
             'description' => "TEST DESCRIPTION"
         ]);
 
         $response = $this->delete(route('books.destroy', $book->id));
 
         $response->assertNoContent();
    }
 

    public function show_all_todo()
    {
        $book = Book::factory()->create([
            'name' => "TEST NAME",
            'description' => "TEST DESCRIPTION"
        ]);

        $response = $this->getJson(route('todo.index'));

        $response->assertOk();

        $this->assertCount(1, $response->json());

        $this->assertEquals('TEST NAME', $response->json()[0]['name']);
        $this->assertEquals('TEST DESCRIPTION', $response->json()[0]['description']);
    }

    public function show_todo()
    {
        $book = Book::factory()->create([
            'name' => "TEST NAME",
            'description' => "TEST DESCRIPTION"
        ]);

        $response = $this->getJson(route('todo.show', $book->id));

        $response->assertOk();

        $this->assertEquals('TEST NAME', $response->json()['name']);
        $this->assertEquals('TEST DESCRIPTION', $response->json()['description']);
    }

    public function update_todo_test()
    {
        $book = Book::factory()->create();

        $response = $this->putJson(route('books.update', $book->id), [
            'name' => "TEST NAME",
            'description' => "TEST DESCRIPTION"
        ]);

        $response->assertOk();

        $this->assertEquals('TEST NAME', $response->json()['name']);
        $this->assertEquals('TEST DESCRIPTION', $response->json()['description']);
    }
 }

    

    

