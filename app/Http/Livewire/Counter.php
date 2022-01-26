<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $categories;
 
    public function increment()
    {   
        
        $this->count++;
        
    }

    public function mount() {
        //$this->title=$categories->name; 
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}