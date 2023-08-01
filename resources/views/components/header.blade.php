


@foreach($items as $menu_item)

    <li>
        <a href="{{ $menu_item->link() }}" style="white-space: nowrap;">

            {{ $menu_item->title }}
        </a>
    </li>

@endforeach
