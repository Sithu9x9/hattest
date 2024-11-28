@props(['slider'])
<div
    class="modal fade editModal"
    id="editSliderModal{{ $slider->id }}"
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
                <h3 class="box-title">Edit Slider</h3>
                <div class="box-tools pull-right">
                    <button
                        type="button"
                        data-dismiss="modal"
                        class="btn btn-flat btn-box-tool"
                    ><i class="fa fa-times"></i></button>
                </div>
            </div>

            <form
                action="{{ route('admin.sliders.update', $slider->id) }}"
                method="POST"
                enctype="multipart/form-data"
                id="editSliderForm"
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
                        <label for="alt">Alt</label>
                        <div id="edit-summernote"></div>
                        <input
                            type="hidden"
                            name="alt"
                            id="alt"
                            value="{{ $slider->alt }}"
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
