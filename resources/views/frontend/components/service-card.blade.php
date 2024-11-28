@props(['service'])

<div
    {{ $attributes->merge(['class' => 'px-3 px-md-5 pb-4']) }}
>
    <div style="width: 150px;">
        <img src="{{ asset($service->logo) }}" alt="Service Logo" class="w-100">
    </div>
    <h4 class="text-capitalize fw-semibold mb-3">
        {{ $service->title }}
    </h4>
    <p class="mb-0" style="text-align: justify;">
        {{ $service->content }}
    </p>
</div>
