@props(['client'])

<div
    class="modal fade"
    id="editClientModal{{ $client->id }}"
    data-backdrop="static"
    data-keyboard="false"
    data-validate-file="false"
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
                <h3 class="box-title">Edit Client</h3>
                <div class="box-tools pull-right">
                    <button
                        type="button"
                        data-dismiss="modal"
                        class="btn btn-flat btn-box-tool"
                    ><i class="fa fa-times"></i></button>
                </div>
            </div>

            <form
                action="{{ route('admin.clients.update', $client->id) }}"
                method="POST"
                enctype="multipart/form-data"
                id="editClientForm"
            >
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input
                            type="file"
                            class="form-control"
                            id="logo"
                            name="logo"
                        >
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="link"
                            name="link"
                            value="{{ $client->link }}"
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
