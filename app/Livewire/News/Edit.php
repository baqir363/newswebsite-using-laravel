<?php

namespace App\Livewire\News;

use Livewire\Component;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $newsId;
    public $heading;
    public $excerpt;
    public $content;
    public $category_id;
    public $categories;

    protected $rules = [
        "heading" => "required",
        "excerpt" => "required",
        "content" => "required",
        "category_id" => "required|exists:categories,id",
    ];

    public function mount($news = null)
    {
        $this->categories = Category::all();

        if ($news) {
            // Edit Mode: Load existing news data
            $this->newsId = $news->id;
            $this->heading = $news->heading;
            $this->excerpt = $news->excerpt;
            $this->content = $news->content;
            $this->category_id = $news->category_id;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->newsId) {
            // Update existing news
            $news = News::find($this->newsId);
            if ($news) {
                $news->update([
                    'heading' => $this->heading,
                    'excerpt' => $this->excerpt,
                    'content' => $this->content,
                    'category_id' => $this->category_id,
                    'user_id' => Auth::id(),
                ]);

                session()->flash('message', 'News updated successfully.');
            }
        } else {
            // Create new news
            News::create([
                'heading' => $this->heading,
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'category_id' => $this->category_id,
                'user_id' => Auth::id(),
            ]);

            session()->flash('message', 'News created successfully.');
        }

        return redirect()->route('news.index');
    }

    public function render()
    {
        return view('livewire.news.edit');
    }
}
