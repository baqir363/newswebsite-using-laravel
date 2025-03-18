<div>
    @foreach($collection as $row)
        <a class="link-light text-decoration-none" href="{{ route('news.show',['news'=>$row->news->slug])}}">{{ $row->news->heading}}</a>
        @if (!$loop->last)
            &nbsp; | &nbsp;
        @endif
    @endforeach
</div>
