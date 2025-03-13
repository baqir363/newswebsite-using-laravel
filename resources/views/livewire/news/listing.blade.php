<div class="border rounded p-2 mb-3">
    @isset($news->image)
        <img src="{{ asset('storage/'.$news->image)}}" alt="" style="width: 110px; height: 70px;" class="rounded float-start me-2 mt-2">
    @endisset
    <a href="{{ route('category.show', ['category'=>$news->category->slug])}}" class="float-end link-secondary text-decoration-none">{{ $news->category->name }}</a>
    <h5><a href="{{ route('news.show',['news'=>$news->id])}}">{{ $news->heading }}</a></h5>
    <small class="text-muted">{{ $news->created_at->diffForHumans() }}</small><br>
    {{ $news->excerpt }}
</div>
