<!-- Modal -->
<div
    class="modal fade"
    id="productModal{{ $product->id }}"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="productModal{{ $product->id }}Label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1
                    class="modal-title fs-5"
                    id="productModal{{ $product->id }}Label"
                >{{ $product->title }}</h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <img
                    src="{{ asset($product->image) }}"
                    alt="Product Image"
                    class="w-100 mb-3 rounded"
                    style="height: 300px; object-fit: cover;"
                >
                <div style="text-align: left;">{!! $product->description !!}</div>
                <div class="mt-4 d-flex justify-content-end align-items-center">
                    @if ($product->playstore_link)
                        <a
                            href="{{ $product->playstore_link }}"
                            target="_blank"
                            style="text-decoration: none;"
                        >
                            <img
                                src="{{ asset('frontend/images/play-store.png') }}"
                                alt="Play Store"
                                width="100"
                            >
                        </a>
                    @endif

                    @if ($product->appstore_link)
                        <a
                            href="{{ $product->appstore_link }}"
                            target="_blank"
                        >
                            <img
                                src="{{ asset('frontend/images/app-store.png') }}"
                                alt="App Store"
                                width="100"
                            >
                        </a>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-dismiss="modal"
                >Close</button>
            </div>
        </div>
    </div>
</div>
