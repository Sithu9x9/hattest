@extends('layouts.back-app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Our Banner Slider List</h3>
        </div>
        <div class="box-body">
            <div style="display: flex; justify-content: end; margin: 1rem 0;">
                <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addSliderModal"
                    id="addSliderBtn"
                ><i class="fas fa-plus-circle"></i> Add Data</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Text</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key => $slider)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td width="100">
                                    <img
                                        src="{{ asset($slider->image) }}"
                                        alt="Slider Image"
                                        width="100"
                                    >
                                </td>
                                <td
                                    width="500"
                                    class="altTableCell"
                                >{!! $slider->alt !!}</td>
                                <td style="display: flex; gap: 5px;">
                                    <button
                                        class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#editSliderModal{{ $slider->id }}"
                                    ><i class="far fa-edit"></i> Edit</button>
                                    <form
                                        action="{{ route('admin.sliders.destroy', $slider->id) }}"
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
        id="addSliderModal"
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
                    <h3 class="box-title">Add Slider</h3>
                    <div class="box-tools pull-right">
                        <button
                            type="button"
                            data-dismiss="modal"
                            class="btn btn-flat btn-box-tool"
                        ><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <form
                    action="{{ route('admin.sliders.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    id="addSliderForm"
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
                            <label for="alt">Alt</label>
                            <div class="summernote"></div>
                            <input
                                type="hidden"
                                name="alt"
                                id="alt"
                            >
                            <small>
                                <span
                                    id="altError"
                                    class="text-danger"
                                ></span>
                            </small>
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

    @foreach ($sliders as $slider)
        <x-slider-edit-modal :slider="$slider" />
    @endforeach
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {
            $('.altTableCell').each(function(index) {
                var rawText = stripHtml($(this).html());
                var truncatedText = truncateText(rawText, 20);
                $(this).text(truncatedText);
            });

            $('form#editSliderForm').submit(function(e) {
                var alt = $(this).find("#edit-summernote").summernote('code');
                $(this).find("input[name=alt]").val(alt)
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

                var alt = $(this).find("input[name=alt]").val();
                $(this).find('#edit-summernote').summernote('code', alt);
            })

            $('#addSliderBtn').click(function() {
                $('#imageError').text('');
                $('#titleError').text('');
                $('#altError').text('');
                $('#categoryError').text('');
                $('#linkError').text('');

                $(".summernote").summernote('code', '')

                $('#addSliderForm #image').val('');
                $('#addSliderForm #title').val('');
                $('#addSliderForm #alt').val('');
                $('#addSliderForm #category').val('');
                $('#addSliderForm #link').val('');
                $('#addSliderForm #playstore_link').val('');
                $('#addSliderForm #appstore_link').val('');
            })

            $('#addSliderForm').submit(function(e) {
                e.preventDefault();

                var alt = $(".summernote").summernote('code');
                $("input[name=alt]").val(alt);

                $('#imageError').text('');
                $('#titleError').text('');
                $('#altError').text('');
                $('#categoryError').text('');
                $('#linkError').text('');

                var image = $('#addSliderForm #image').val();
                var title = $('#addSliderForm #title').val();
                var alt = $('#addSliderForm #alt').val();
                var category = $('#addSliderForm #category').val();
                var link = $('#addSliderForm #link').val();
                var playStoreLink = $('#addSliderForm #playstore_link').val();
                var appStoreLink = $('#addSliderForm #appstore_link').val();

                var isValid = true;
                if (image === '') {
                    $('#imageError').text('Please select a image');
                    isValid = false;
                }
                if (title === '') {
                    $('#titleError').text('Please enter a title');
                    isValid = false;
                }
                if (alt === '') {
                    $('#altError').text('Please enter a alt');
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
