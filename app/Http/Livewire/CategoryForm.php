<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public Category $category;

    protected function rules(){
        return [
            'category.name' => ['required','min:4','regex:/^[a-zA-Z\s]+$/u'],
            'category.description' => ['required','min:4'],
        ];
    }

    protected $messages = [
        'category.name.required' => 'El nombre de la categoría es obligatorio.',
        'category.name.regex' => 'El nombre de la categoría solo debe contener texto.',
        'category.name.min' => 'El asunto debe contener mínimo 4 caracteres.',
        'category.description.min' => 'El asunto debe contener mínimo 4 caracteres.',
        'category.description.required' => 'Describa en extenso la problemática que presenta.',
    ];

    public function cancelCategoryForm()
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

        if(!$this->category->exists)
            $this->category->save();

        $this->redirectRoute('categories.list');

        session()->flash('status', __('category saved correctly'));

    }

    public function delete()
    {
        $this->category->delete();

        session()->flash('status', __('category cancelled correctly'));

        $this->redirect(route('categories.list'));
    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
