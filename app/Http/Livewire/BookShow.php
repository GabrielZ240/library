<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookShow extends Component
{
    public Book $book;

    public function render()
    {
        return view('livewire.book-show');
    }
}
