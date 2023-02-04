
<div class="page-content">
    <div class="card" style="overflow: hidden;">
        <div class="card-body">
            <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="service_title">Title</label>
                    <input type="text" class="form-control" id="service_title" name="service_title" placeholder="Enter title" value="{{ $service_title }}">
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="service_content">content</label>
                            <textarea class="form-control" id="service_content" name="service_content" rows="3">{{ $service_content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="service_icon">Icon</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="service_icon" name="service_icon" placeholder="Enter link" value="{{ $service_icon }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-toggle="modal" data-target="#modal-icon-select">Choose</button>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="service_short_description">Short Description</label>
                            <textarea class="form-control" id="service_short_description" name="service_short_description" rows="3">{{ $service_short_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group w-100">

                    @if($page == 'edit')
                        <input type="hidden" name="service_id" value="{{ $id_service }}">
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
