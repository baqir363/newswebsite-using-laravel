<div>
    <input type="text" wire:model.live="keyword" class="form-control">
    @if($keyword!='' && sizeof($results)==0)
        <div class="py-2 mt-1">No results found</div>
    @endif
    @foreach ($results as $row)
        <div class="mt-2 p-2 border rounded"><a class="text-decoration-none" href="{{ route('news.show',['news'=>$row->id])}}">{{ $row->heading}}</a><small class="float-end">{{ $row->created_at->diffForHumans() }}</small></div>
    @endforeach
</div>
