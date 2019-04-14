    
@foreach ($test as $item)
    <li>
        <i class="{{ $item['icon'] }}"></i>
        <span><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></span>
    </li>
@endforeach