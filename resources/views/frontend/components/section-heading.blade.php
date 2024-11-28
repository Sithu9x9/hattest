@props(['subtitle', 'title', 'align' => 'center', 'aosDirection' => 'right'])

<div class="mb-5 {{ $align == 'center' ? 'mx-auto text-center w-md-50 mt-5' : '' }}" data-aos="zoom-in-up">
    <h6 class="text-uppercase fw-bold text-orange" style="letter-spacing: 3px;">{{ $subtitle }}</h6>
    <h2 class="text-uppercase fw-bold">{!! $title !!}</h2>
</div>
