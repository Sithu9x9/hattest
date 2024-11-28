@props(['route', 'icon', 'title', 'activeWord'])

@php
    $isActive = strpos(request()->route()->getName(), $activeWord) !== false;
@endphp

<li class="{{ $isActive ? 'active' : '' }}">
    <a href="{{ route($route) }}">
        <i class="{{ $icon }}" style="margin-right: 5px;"></i>
        <span class="title">{{ $title }}</span>
    </a>
</li>
