<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public function render()
    {
        $this->categories = Category::get();

        return view('livewire.category-list',[
            'categories' => $this->categories,
        ])->layout('layouts.app');
    }
}
