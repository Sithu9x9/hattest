@props(['service'])
<div
    class="modal fade"
    id="editServiceModal{{ $service->id }}"
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
                <h3 class="box-title">Edit Service</h3>
                <div class="box-tools pull-right">
                    <button
                        type="button"
                        data-dismiss="modal"
                        class="btn btn-flat btn-box-tool"
                    ><i class="fa fa-times"></i></button>
                </div>
            </div>

            <form
                action="{{ route('admin.services.update', $service->id) }}"
                method="POST"
                enctype="multipart/form-data"
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
                        <label for="title">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ $service->title }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea
                            class="form-control"
                            id="content"
                            rows="4"
                            style="resize: none;"
                            name="content"
                        >{{ $service->content }}</textarea>
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
