
<div class="page-content">
    <div class="card" style="overflow: hidden;">
        <div class="card-body">
            <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="social_media_name">Title</label>
                    <input type="text" class="form-control" id="social_media_name" name="social_media_name" placeholder="Enter title" value="{{ $social_media_name }}">
                </div>
                <div class="form-group">
                    <label for="social_media_icon">Icon</label>
                    <input type="text" class="form-control" id="social_media_icon" name="social_media_icon" placeholder="Enter title" value="{{ $social_media_icon }}">
                </div>
                <div class="form-group">
                    <label for="social_media_url">URL</label>
                    <input type="text" class="form-control" id="social_media_url" name="social_media_url" placeholder="Enter title" value="{{ $social_media_url }}">
                </div>

                <div class="form-group w-100">

                    @if($page == 'edit')
                        <input type="hidden" name="social_media_id" value="{{ $id_social_media }}">
                    @endif
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>Publish</button>
                    <button type="button" wire:click="setPage('index')" class="btn btn-default">Cancel</button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function cleanAllErrorIndicator() {
                // remove all error indicator
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').html('');
            }

            $('#formnya').submit(function(e) {
                e.preventDefault();

                cleanAllErrorIndicator();

                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var formdata = new FormData();

                // disable submit button
                form.find('button[type=submit]').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Loading...');

                // get all input
                form.find('input, select, textarea').each(function() {
                    var input = $(this);
                    var name = input.attr('name');
                    var value = input.val();

                    formdata.append(name, value);
                });

                $.ajax({
                    type: method,
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // trigger event setMenu with parameter 'index'
                        window.livewire.emit('setPage', 'index');

                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            timer: 3000
                        })
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: 'Error!',
                            text: response.responseJSON.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                        // make input to red
                        $.each(response.responseJSON.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).closest('.form-group').find('.invalid-feedback').html(value);
                        });

                        // enable submit button
                        form.find('button[type=submit]').prop('disabled', false).html('<i class="fa fa-paper-plane"></i> Publish');
                    }
                });
            });
        })
    </script>
</div>
