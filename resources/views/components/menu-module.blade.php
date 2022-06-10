@if(isset($slot) && !empty($slot->toHtml()))
<li {{ $attributes->merge(['class'=>$className]) }}>
    @if ($title)
        <a>
            @if (isset($icon) && !empty($icon->toHtml()))
                {!! $icon !!}
            @else
                <i class="fa fa-sitemap" aria-hidden="true"></i>
            @endif
            <span>{{ $title}}</span>
        </a>
    @endif

    <ul class="nav child-nav level-1">
        {{$slot}}
    </ul>
</li>
@endif
