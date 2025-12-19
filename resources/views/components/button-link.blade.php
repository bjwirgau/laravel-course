@props([
    'url' => '/',
    'icon' => null,
    'bgClass' => 'bg-yellow-500',
    'textClass' => 'text-black',
    'hoverClass' => 'hover:bg-yellow-600',
    'block' => false
])

<a
    href="{{$url}}"
    class="{{$block ? 'block ' : ''}}{{$bgClass}} {{$hoverClass}} {{$textClass}} px-4 py-2 rounded hover:shadow-md transition duration-300"
>
    @if($icon)
        <i class="fa fa-{{$icon}}"></i>
    @endif
    {{ $slot }}
</a>