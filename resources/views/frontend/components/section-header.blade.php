@props(['subtitle' => null, 'title', 'accordionId' => 'accordionId'])

<div
    {{ $attributes->merge([
        'class' => 'py-5 px-2 mb-4 text-center section-header rounded-1 position-relative accordion-button collapsed',
        'data-aos' => 'zoom-in-up',
        'data-bs-toggle' => 'collapse',
        'data-bs-target' => $accordionId,
        'style' => 'cursor:pointer;',
    ]) }}>
    <div class="position-absolute  top-50 start-50 translate-middle w-100">
        <div class="d-flex justify-content-center align-items-baseline gap-2">
            <h2 class="text-uppercase fw-medium m-0">{!! $title !!}</h2>
            <span
                class="rounded-circle bg-orange"
                style="width: 10px; height: 10px;"
            ></span>
        </div>
        @if ($subtitle)
            <p
                class="text-uppercase fw-medium mt-2 mb-0"
                style="letter-spacing: 1px;"
            >
                {!! $subtitle !!}
            </p>
        @endif
    </div>
</div>
