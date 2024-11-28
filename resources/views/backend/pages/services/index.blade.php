@extends('layouts.back-app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Our Services List</h3>
        </div>
        <div class="box-body">
            <div style="display: flex; justify-content: end; margin: 1rem 0;">
                <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addServiceModal"
                    id="addServiceBtn"
                ><i class="fas fa-plus-circle"></i> Add Data</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $key => $service)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img
                                        src="{{ asset($service->logo) }}"
                                        alt="Service Logo"
                                        width="100"
                                    >
                                </td>
                                <td>{{ $service->title }}</td>
                                <x-service-edit-modal :service="$service" />
                                <td style="display: flex; gap: 5px;">
                                    <button
                                        class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#editServiceModal{{ $service->id }}"
                                    ><i class="far fa-edit"></i> Edit</button>
                                    <form
                                        action="{{ route('admin.services.destroy', $service->id) }}"
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
        id="addServiceModal"
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
                    <h3 class="box-title">Add Service</h3>
                    <div class="box-tools pull-right">
                        <button
                            type="button"
                            data-dismiss="modal"
                            class="btn btn-flat btn-box-tool"
                        ><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <form
                    action="{{ route('admin.services.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    id="addServiceForm"
                >
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input
                                type="file"
                                class="form-control"
                                id="logo"
                                name="logo"
                            >
                            <small>
                                <span
                                    id="logoError"
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
                            <label for="content">Content</label>
                            <textarea
                                class="form-control"
                                id="content"
                                rows="4"
                                style="resize: none;"
                                name="content"
                            ></textarea>
                            <small>
                                <span
                                    id="contentError"
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
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#addServiceBtn').click(function() {
                $('#logoError').text('');
                $('#titleError').text('');
                $('#contentError').text('');

                $('#addServiceForm #logo').val('');
                $('#addServiceForm #title').val('');
                $('#addServiceForm #content').val('');
            })

            $('#addServiceForm').submit(function(e) {
                e.preventDefault();

                $('#logoError').text('');
                $('#titleError').text('');
                $('#contentError').text('');

                var logo = $('#addServiceForm #logo').val();
                var title = $('#addServiceForm #title').val();
                var content = $('#addServiceForm #content').val();

                var isValid = true;
                if (logo === '') {
                    $('#logoError').text('Please select a logo');
                    isValid = false;
                }
                if (title === '') {
                    $('#titleError').text('Please enter a title');
                    isValid = false;
                }
                if (content === '') {
                    $('#contentError').text('Please enter a content');
                    isValid = false;
                }

                if (isValid) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
