@props(['icon', 'title', 'description'])

<div class="rounded-1 p-4 h-100" style="background-color: var(--bs-gray-200)">
    <i class="{{ $icon }} fs-4 fw-bold text-primary"></i>
    <h4 class="my-1">{{ $title }}</h4>
    <p class="m-0 fw-medium">{!! $description !!}</p>
</div>
