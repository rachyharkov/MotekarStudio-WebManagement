
<div class="page-content">
    <div class="card" style="overflow: hidden;">
        <div class="card-body">
            <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="portofolio_title">Title</label>
                    <input type="text" class="form-control" id="portofolio_title" name="portofolio_title" placeholder="Enter title" value="{{ $portofolio_title }}">
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="portofolio_content">content</label>
                            <textarea class="form-control" id="portofolio_content" name="portofolio_content" rows="3">{{ $portofolio_content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="portofolio_foto_sampul">Image</label>
                            <input type="file" class="form-control" id="portofolio_foto_sampul" name="portofolio_foto_sampul">
                            @if($page == 'edit')
                                <a href="{{ asset('images/portofolios/'.$portofolio_foto_sampul) }}" target="_blank">Lihat foto</a>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="portofolio_link">Link</label>
                            <input type="text" class="form-control" id="portofolio_link" name="portofolio_link" placeholder="Enter link" value="{{ $portofolio_link }}">
                        </div>
                        <div class="form-grouo">
                            <label for="portofolio_service">Service</label>
                            <input type="text" class="form-control" id="portofolio_service" name="portofolio_service" placeholder="Enter service" value="{{ $portofolio_service }}">
                        </div>
                    </div>
                </div>
                <div class="form-group w-100">

                    @if($page == 'edit')
                        <input type="hidden" name="portofolio_id" value="{{ $id_portofolio }}">
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

                if ($('#portofolio_foto_sampul')[0].files[0]) {
                    formdata.append('portofolio_foto_sampul', $('#portofolio_foto_sampul')[0].files[0])
                }

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
