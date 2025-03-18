<?php
namespace App\Livewire\News;

use Livewire\Component;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public $news_id;
    public $heading;
    public $excerpt;
    public $slug;
    public $content;
    public $category_id;
    public $image; // Stores the existing image path (if any)
    public $file; // New image upload
    public $categories;
    public $city_id;
    protected $listeners = ['selectedCity' => 'updateCity'];
    protected function rules()
    {
        return [
            'heading' => 'required|string|max:255',
            'slug' => 'required|string|unique:news,slug,' . $this->news_id, // Ensure slug is unique
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|image|max:2048', // Max 2MB for images
            'city_id' => 'required|exists:cities,id',
        ];
    }

    public function mount(News $news = null)
    {
        if ($news) {
            $this->news_id = $news->id;
            $this->heading = $news->heading;
            $this->slug = $news->slug; // Load existing slug
            $this->excerpt = $news->excerpt;
            $this->content = $news->content;
            $this->category_id = $news->category_id;
            $this->image = $news->image;
            $this->city_id = $news->city_id;
        }

        $this->categories = Category::all();
    }
    public function updatedHeading()
    {
        $this->slug = Str::slug($this->heading, '-');
    }
    public function save()
    {
        $this->validate();

        $news = $this->news_id ? News::find($this->news_id) : new News();

        if ($this->file) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image); // Delete old image
            }
            $filePath = $this->file->store('news', 'public'); // Store new image
        } else {
            $filePath = $this->image; // Keep old image
        }


        // Assign values
        $news->heading = $this->heading;
        $news->slug = Str::slug($this->heading);
        $news->excerpt = $this->excerpt;
        $news->content = $this->content;
        $news->category_id = $this->category_id;
        $news->city_id = $this->city_id ?? null;
        $news->image = $filePath; // Store in DB

        if (!$this->news_id) {
            $news->user_id = Auth::id();
        }

        $news->save();

        session()->flash('message', 'News saved successfully.');
        return redirect()->route('news.index');
    }


    public function updateCity($cityId)
    {
        $this->city_id = $cityId; // Correctly store selected city ID
    }
    public function render()
    {
        return view('livewire.news.edit');
    }
}
