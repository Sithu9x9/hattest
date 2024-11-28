@extends('layouts.back-app')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Our Clients List</h3>
        </div>
        <div class="box-body">
            <div style="display: flex; justify-content: end; margin: 1rem 0;">
                <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addClientModal"
                    id="addClientBtn"
                ><i class="fas fa-plus-circle"></i> Add Data</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Logo</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $key => $client)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img
                                        src="{{ asset($client->logo) }}"
                                        alt="Client Logo"
                                        width="100"
                                    >
                                </td>
                                <td>{{ $client->link }}</td>
                                <x-client-edit-modal :client="$client" />
                                <td style="display: flex; gap: 5px;">
                                    <button
                                        class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#editClientModal{{ $client->id }}"
                                    ><i class="far fa-edit"></i> Edit</button>
                                    <form
                                        action="{{ route('admin.clients.destroy', $client->id) }}"
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
        id="addClientModal"
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
                    <h3 class="box-title">Add Client</h3>
                    <div class="box-tools pull-right">
                        <button
                            type="button"
                            data-dismiss="modal"
                            class="btn btn-flat btn-box-tool"
                        ><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <form
                    action="{{ route('admin.clients.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    id="addClientForm"
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
            $('#addClientBtn').click(function () {
                $('#logoError').text('');
                $('#linkError').text('');
                $('#addClientForm #logo').val('');
                $('#addClientForm #link').val('');
            })

            $('#addClientForm').submit(function(e) {
                e.preventDefault();

                $('#logoError').text('');
                $('#linkError').text('');

                var logo = $('#addClientForm #logo').val();
                var link = $('#addClientForm #link').val();

                var isValid = true;
                if (logo === '') {
                    $('#logoError').text('Please select a logo');
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
        });
    </script>
@endsection
