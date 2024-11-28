@props(['product'])

<div
    class="modal fade editModal"
    id="editProductModal{{ $product->id }}"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    tabindex="-1"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered"
        role="document"
    >
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Product</h3>
                <div class="box-tools pull-right">
                    <button
                        type="button"
                        data-dismiss="modal"
                        class="btn btn-flat btn-box-tool"
                    ><i class="fa fa-times"></i></button>
                </div>
            </div>

            <form
                action="{{ route('admin.products.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
                id="editProductForm"
            >
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
                        >
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ $product->title }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div id="edit-summernote"></div>
                        <input
                            type="hidden"
                            name="description"
                            id="description"
                            value="{{ $product->description }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="category">Category <small> <i>(* Use comma seperated for multiple
                                    categories)</i></small></label>
                        <input
                            type="text"
                            class="form-control"
                            id="category"
                            name="category"
                            value="{{ $product->category }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="link"
                            name="link"
                            value="{{ $product->link }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="playstore_link">Play Store Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="playstore_link"
                            name="playstore_link"
                            value="{{ $product->playstore_link }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="appstore_link">App Store Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="appstore_link"
                            name="appstore_link"
                            value="{{ $product->appstore_link }}"
                        >
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        type="submit"
                        class="btn btn-primary"
                    ><i class="far fa-save"></i> Save</button>
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    ><i class="far fa-window-close"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
