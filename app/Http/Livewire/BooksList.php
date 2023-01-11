<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;

class BooksList extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $status = '';

    public function render()
    {
        $this->books = Book::where('books.name','like',"%{$this->search}%")
        ->orWhere('books.status','like',"%{ $this->status }%")
        ->latest();

        //dd($this->books);

        $this->books = $this->books->paginate($this->perPage);
        $links = $this->books;
        $this->books = collect($this->books->items());

        return view('livewire.books-list',[
            'books' => $this->books,
            'links' => $links
        ])->layout('layouts.app');
    }
}
