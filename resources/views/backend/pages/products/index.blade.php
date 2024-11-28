@extends('layouts.back-app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Our Products List</h3>
        </div>
        <div class="box-body">
            <div style="display: flex; justify-content: end; margin: 1rem 0;">
                <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addProductModal"
                    id="addProductBtn"
                ><i class="fas fa-plus-circle"></i> Add Data</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img
                                        src="{{ asset($product->image) }}"
                                        alt="product Image"
                                        width="150"
                                        style="border-radius: 4px;"
                                    >
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>
                                    @foreach (explode(', ', $product->category) as $category)
                                        <span
                                            class="badge badge-success"
                                            style="border-radius: 2px; background: #3C8DBC;"
                                        >{{ $category }}</span> <br />
                                    @endforeach
                                </td>
                                <td style="display: flex; gap: 5px;">
                                    <button
                                        class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#editProductModal{{ $product->id }}"
                                    ><i class="far fa-edit"></i> Edit</button>
                                    <form
                                        action="{{ route('admin.products.destroy', $product->id) }}"
                                        class="d-inline"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure to want to delete?')"
                                        ><i class="far fa-trash-alt"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div
        class="modal fade"
        id="addProductModal"
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
                    <h3 class="box-title">Add Product</h3>
                    <div class="box-tools pull-right">
                        <button
                            type="button"
                            data-dismiss="modal"
                            class="btn btn-flat btn-box-tool"
                        ><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <form
                    action="{{ route('admin.products.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    id="addProductForm"
                >
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input
                                type="file"
                                class="form-control"
                                id="image"
                                name="image"
                            >
                            <small>
                                <span
                                    id="imageError"
                                    class="text-danger"
                                ></span>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                            >
                            <small>
                                <span
                                    id="titleError"
                                    class="text-danger"
                                ></span>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <div class="summernote"></div>
                            <input
                                type="hidden"
                                name="description"
                                id="description"
                            >
                            <small>
                                <span
                                    id="descriptionError"
                                    class="text-danger"
                                ></span>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="category">
                                Category <small><i>(* Use comma seperated for multiple
                                        categories)</i></small>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="category"
                                name="category"
                            >

                            <small>
                                <span
                                    id="categoryError"
                                    class="text-danger"
                                ></span>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input
                                type="text"
                                class="form-control"
                                id="link"
                                name="link"
                            >
                            <small>
                                <span
                                    id="linkError"
                                    class="text-danger"
                                ></span>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="playstore_link">Play Store Link</label>
                            <input
                                type="text"
                                class="form-control"
                                id="playstore_link"
                                name="playstore_link"
                            >
                        </div>
                        <div class="form-group">
                            <label for="appstore_link">App Store Link</label>
                            <input
                                type="text"
                                class="form-control"
                                id="appstore_link"
                                name="appstore_link"
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

    @foreach ($products as $product)
        <x-product-edit-modal :product="$product" />
    @endforeach
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('form#editProductForm').submit(function(e) {
                var description = $(this).find("#edit-summernote").summernote('code');
                $(this).find("input[name=description]").val(description)
            })

            $('.editModal').each(function() {
                $(this).find('#edit-summernote').summernote({
                    tabDisable: true,
                    placeholder: 'Type Something here...',
                    tabsize: 2,
                    height: 150,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                        ['height', ['height']],
                        ['view', ['fullscreen', 'help']],
                    ],
                    popover: {
                        air: [
                            ['color', ['color']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['para', ['ul', 'paragraph']],
                            ['insert', ['link', 'picture']]
                        ],
                        link: [
                            ['link', ['linkDialogShow', 'unlink']]
                        ],
                    }
                });

                var description = $(this).find("input[name=description]").val();
                $(this).find('#edit-summernote').summernote('code', description);
            })

            $('#addProductBtn').click(function() {
                $('#imageError').text('');
                $('#titleError').text('');
                $('#descriptionError').text('');
                $('#categoryError').text('');
                $('#linkError').text('');

                $(".summernote").summernote('code', '')

                $('#addProductForm #image').val('');
                $('#addProductForm #title').val('');
                $('#addProductForm #description').val('');
                $('#addProductForm #category').val('');
                $('#addProductForm #link').val('');
                $('#addProductForm #playstore_link').val('');
                $('#addProductForm #appstore_link').val('');
            })

            $('#addProductForm').submit(function(e) {
                e.preventDefault();

                var description = $(".summernote").summernote('code');
                $("input[name=description]").val(description);

                $('#imageError').text('');
                $('#titleError').text('');
                $('#descriptionError').text('');
                $('#categoryError').text('');
                $('#linkError').text('');

                var image = $('#addProductForm #image').val();
                var title = $('#addProductForm #title').val();
                var description = $('#addProductForm #description').val();
                var category = $('#addProductForm #category').val();
                var link = $('#addProductForm #link').val();
                var playStoreLink = $('#addProductForm #playstore_link').val();
                var appStoreLink = $('#addProductForm #appstore_link').val();

                var isValid = true;
                if (image === '') {
                    $('#imageError').text('Please select a image');
                    isValid = false;
                }
                if (title === '') {
                    $('#titleError').text('Please enter a title');
                    isValid = false;
                }
                if (description === '') {
                    $('#descriptionError').text('Please enter a description');
                    isValid = false;
                }
                if (category === '') {
                    $('#categoryError').text('Please enter a category');
                    isValid = false;
                }
                if (link === '') {
                    $('#linkError').text('Please enter a link');
                    isValid = false;
                }

                if (isValid) {
                    this.submit();
                }
            });
        })
    </script>
@endsection
