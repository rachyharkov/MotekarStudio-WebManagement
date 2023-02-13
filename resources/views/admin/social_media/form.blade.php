<div class="modal fade" id="modalDialogForm" tabindex="-1" aria-labelledby="modalDialogFormTitle" style="display: none;"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formnya" action="" method="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDialogFormTitle">

                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="social_media_name">Social Media Name</label>
                        <input type="text" class="form-control" id="social_media_name" name="social_media_name" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label for="social_media_type">Account Platform</label>
                        <select class="form-control" id="social_media_type" name="social_media_type"></select>
                        <input type="hidden" id="social_media_icon" name="social_media_icon">
                        <input type="hidden" id="social_media_color_primary" name="social_media_color_primary">
                        <input type="hidden" id="social_media_color_secondary" name="social_media_color_secondary">
                    </div>
                    <div class="form-group">
                        <label for="social_media_url">URL</label>
                        <input type="url" class="form-control" id="social_media_url" name="social_media_url" placeholder="Enter title" required>
                    </div>

                    <div class="form-group w-100">
                        <input type="hidden" name="social_media_id" id="social_media_id">
                        {{ csrf_field() }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1 btn-submit">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
