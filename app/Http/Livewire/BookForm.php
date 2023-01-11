<?php

namespace App\Http\Livewire;

use App\Mail\MessageReceived;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class BookForm extends Component
{
    public Book $book;
    public $categories = [];
    public $users;
    public $cat = [];

    protected function rules(){
            return [
            'book.name' => ['required','min:4','regex:/^[a-zA-Z\s]+$/u'],
            'book.author' => ['required','min:4','regex:/^[a-zA-Z\s]+$/u'],
            'book.status' => ['required'],
            'book.published_date' => ['required'],
            'book.user_id' => [''],
            'cat' => ['required']
        ];
    }

    protected $messages = [
        'book.name.required' => 'El nombre del libro es obligatorio.',
        'book.author.min' => 'El nombre del autor debe contener mínimo 4 caracteres.',
        'book.name.regex' => 'El nombre del libro solo debe contener texto.',
        'book.name.min' => 'El nombre del libro debe contener mínimo 4 caracteres.',
        'book.name.required' => 'El nombre del libro es obligatorio.',
        'book.author.min' => 'El nombre del autor debe contener mínimo 4 caracteres.',
        'book.author.regex' => 'El nombre del autor solo debe contener texto.',
        'book.author.required' => 'El nombre del autor es obligatorio.',
        'book.status.required' => 'Seleccine el estatus en el que se encuentra el libro.',
        'book.published_date.required' => 'Se debe seleccionar la fecha de publicación.',
        'cat.required' => 'Se debe seleccionar al menos una categoría.',
    ];

    public function cancelBookForm()
    {
        $this->redirectRoute('home');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->book->published_date = date('Y-m-d',strtotime($this->book->published_date));

        if($this->book->exists && $this->book->status == 'available'){
            $this->book->user_id = null;
            $this->sendMessage($this->book);
        }

        $this->book->save();

        $this->book->categories()->sync($this->cat);

        $this->redirectRoute('home');

        session()->flash('status', __('Book saved correctly'));

    }

    public function delete()
    {
        $this->book->status = 'not available';
        $this->book->save();

        $this->book->delete();

        session()->flash('status', __('Book cancelled correctly'));

        $this->redirect(route('home'));
    }

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->categories = Category::pluck('name','id')->toArray();
        $this->users = User::select('name','id')->get();
    }

    public function render()
    {
        return view('livewire.book-form',[
            'categories' => $this->categories,
            'users' => $this->users,
        ]);
    }

    public function sendMessage($book)
    {
        $mail = Mail::to(auth()->user()->email)->send(new MessageReceived($book));

        return back();
    }
}
