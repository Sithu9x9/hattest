@props(['career'])

<!-- Modal -->
<div
    class="modal fade p-0 apply-job-modal"
    id="careerModal{{ $career->id }}"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="careerModal{{ $career->id }}Label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1
                    class="modal-title fs-5"
                    id="careerModal{{ $career->id }}Label"
                >{{ $career->position }}</h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form
                    method="POST"
                    action="{{ route('careers.apply', $career->id) }}"
                    enctype="multipart/form-data"
                    id="job-apply-form"
                >
                    @csrf
                    <div class="mb-3">
                        <label
                            for="cv"
                            class="form-label required"
                        >Attach CV Form</label>
                        <input
                            class="form-control"
                            type="file"
                            id="cv"
                            name="cv"
                        >
                    </div>
                    <div class="mb-3">
                        <label
                            for="email"
                            class="form-label required"
                            name="email"
                        >Email address</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            aria-describedby="emailHelp"
                        >
                        <div
                            id="emailHelp"
                            class="form-text"
                        >We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label
                            for="cover_letter"
                            class="form-label required"
                        >Cover Letter</label>
                        <div id="cover_letter">
                            <textarea
                                class="form-control"
                                id="summernote"
                                name="cover_letter"
                            ></textarea>
                        </div>
                    </div>
                    <x-loader-button
                        type="submit"
                        buttonId="apply-job-button"
                        loaderId="apply-job-button-loader"
                        iconId="apply-job-button-icon"
                        iconName="bi bi-send"
                    > Apply Now </x-loader-button>
                </form>
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
