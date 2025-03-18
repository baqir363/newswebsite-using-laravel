<div>
        @forelse ($recent as $news)
            @livewire('news.listing', ['news'=>$news])
        @empty
        <div class="text-danger">No more news in this category</div>
        @endforelse
</div>
