@if(isset($slot) && !empty($slot->toHtml()))
    <li {{ $attributes->merge(['class'=>$className]) }}>
        <a><span>{{ $title }}</span></a>
        <ul class="nav child-nav level-2">
            {!! $slot !!}
        </ul>
    </li>
@endif
