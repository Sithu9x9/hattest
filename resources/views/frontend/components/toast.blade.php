@props(['message' => 'HELLO FROM TOAST', 'toastId'])

<div class="toast-container top-0 end-0 p-3">
    <div
        class="toast text-bg-success"
        role="alert"
        id="{{ $toastId }}"
        aria-live="assertive"
        aria-atomic="true"
    >
        <div class="toast-header">
            <img
                src="{{ asset('images/mti_logo_icon.png') }}"
                class="rounded me-2"
                alt="Logo"
                width="50"
            >
            <strong class="me-auto">MTI</strong>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="toast"
                aria-label="Close"
            ></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
</div>
