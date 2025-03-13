<?php
namespace App\Livewire\News;

use Livewire\Component;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $news_id;
    public $heading;
    public $excerpt;
    public $content;
    public $category_id;
    public $image; // Stores the existing image path (if any)
    public $file; // New image upload
    public $categories;

    protected function rules()
    {
        return [
            'heading' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|image|max:2048', // Max 2MB for images
        ];
    }

    public function mount(News $news = null)
    {
        if ($news) {
            $this->news_id = $news->id;
            $this->heading = $news->heading;
            $this->excerpt = $news->excerpt;
            $this->content = $news->content;
            $this->category_id = $news->category_id;
            $this->image = $news->image;
        }

        $this->categories = Category::all();
    }

    public function save()
{
    $this->validate();

    if (!$this->file) {
        \Log::error("No file detected in Livewire component");
        session()->flash('error', 'No file uploaded.');
        return;
    }

    // Store file
    $filePath = $this->file->store('news', 'public');

    \Log::info("Image stored at: " . $filePath); // Log storage path

    $news = $this->news_id ? News::find($this->news_id) : new News();

    // Assign values
    $news->heading = $this->heading;
    $news->excerpt = $this->excerpt;
    $news->content = $this->content;
    $news->category_id = $this->category_id;
    $news->image = $filePath; // Store in DB

    if (!$this->news_id) {
        $news->user_id = Auth::id();
    }

    $news->save();

    \Log::info("Final News Data:", $news->toArray()); // Debug

    session()->flash('message', 'News saved successfully.');
    return redirect()->route('news.index');
}
    public function render()
    {
        return view('livewire.news.edit');
    }
}
