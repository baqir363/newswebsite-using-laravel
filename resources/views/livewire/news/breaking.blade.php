<div>
    @foreach($collection as $row)
        <a class="link-light text-decoration-none" href="">{{ $row->news->heading}}</a>
        @if (!$loop->last)
            &nbsp; | &nbsp;
        @endif
    @endforeach
</div>
