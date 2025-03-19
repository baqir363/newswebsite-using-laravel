<?php
namespace App\Livewire\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class Edit extends Component
{
    public $name;
    public $slug;
    public $category;

    public function mount(Category $category = null)
    {
        $this->category = $category ?? new Category();
        $this->name = $this->category->name;
        $this->slug = $this->category->slug;
    }

    protected $rules = [
        "name" => "required",
        "slug" => "required",
    ];

    public function updatedName()
    {
        $this->validate([
            "name" => "required"
        ]);
        $this->slug = Str::slug($this->name, '-');
    }

    public function save()
    {
        $this->validate();

        $this->category->name = $this->name;
        $this->category->slug = $this->slug;
        $this->category->save();

        session()->flash('message', 'Category Saved');
        return redirect()->to('/category');
    }

    public function render()
    {
        return view('livewire.category.edit');
    }
}
