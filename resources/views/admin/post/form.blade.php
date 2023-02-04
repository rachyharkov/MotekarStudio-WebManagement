
<div class="page-content">
    <div class="card" style="overflow: hidden;">
        <div class="card-body">
            {{-- {{ $foto_sampul }} --}}
            <img id="frame" src="{{ $foto_sampul ? asset('images/posts/' . $foto_sampul) : asset('images/posts/default.png') }}" alt="Foto Sampul"
                style="position: absolute;top:0;left:0;object-fit: cover; {{ $post_title ? 'display: block; width: 100%; height: 208px;' : 'display: none; width: 100%; height: 0px;' }}" />
            <div class="container-fluid" style="position: relative;z-index: 1;">
                <form id="formnya" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                    <div class="form-group" style="margin-bottom: 5vh; margin-top: 7vh;">
                        <input type="text" class="form-control" value="{{ $post_title }}" name="post_title" id="post_title" placeholder="Judul Post" style="background: #c9c9c985; border: none;font-size: 3vw;color: #666666;;" />
                        <span class="invalid-feedback" role="alert"></span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <div class="form-group">
                                <textarea class="form-control" style="height: 80vh;" name="post_content" id="post_content" placeholder="Isi Post">{{ $post_content }}</textarea>
                                <span class="invalid-feedback" role="alert"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="post_category">Jenis Post</label>
                                <select class="form-control" name="post_category" id="post_category" placeholder="Jenis Post">
                                    <option value="">-</option>
                                    @if($post_category)
                                        <option value="{{ $post_category }}" selected>{{ $post_category }}</option>
                                    @endif
                                    @foreach ($post_categories as $post_category)
                                        <option value="{{ $post_category->post_category_name }}"
                                            {{ $post_category == $post_category->post_category_name ? 'selected' : '' }}>
                                            {{ $post_category->post_category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert"></span>
                            </div>
                            <div class="form-group">
                                <label for="datetime">Tanggal</label>
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input type="date" name="created_at_date" id="created_at_date" placeholder="Tanggal Post" value="<?= $created_at ? date('Y-m-d', strtotime($created_at)) : date('Y-m-d') ?>" class="form-control" max="<?= date('Y-m-d') ?>" />
                                    <input type="time" name="created_at_time" id="created_at_time" placeholder="Waktu Post" value="{{ $created_at ? date('H:i', strtotime($created_at)) : date('H:i') }}" class="form-control" />
                                </div>
                                <span class="invalid-feedback" role="alert"></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="tags" id="tags"
                                    placeholder="Tags " value="{{ $tags }}" />
                                <span class="invalid-feedback" role="alert"></span>
                            </div>

                            <div class="form-group">
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-secondary btn-upload-sampul-gambar">
                                        {{ $post_title ? 'Ganti Foto Sampul' : 'Upload Foto Sampul' }}
                                    </button>
                                    <input type="file" name="foto_sampul" id="foto_sampul"
                                        placeholder="Foto Sampul" accept=".png,.jpeg,.jpg" />
                                </div>
                                @if ($post_title)
                                    <input type="hidden" name="foto_sampul_old" id="foto_sampul_old"
                                    value="{{ $foto_sampul }}">
                                @endif
                            </div>

                            <div class="form-group w-100">
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-secondary">
                                      <i class="bi bi-eye"></i> Preview
                                    </button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownPostOption" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                      <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownPostOption" style="">
                                      <a class="dropdown-item" href="#"><i class="bi bi-archive"></i> Draft</a>
                                      <a class="dropdown-item" href="#"><i class="bi bi-eye"></i> Publish</a>
                                    </div>
                                </div>
                                @if($page == 'edit')
                                    <input type="hidden" name="post_id" value="{{ $id_post }}">
                                @endif
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>Publish</button>
                                <button type="button" wire:click="setPage('index')" class="btn btn-default">Cancel</button>
                                {{ csrf_field() }}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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

                if ($('#foto_sampul')[0].files[0]) {
                    formdata.append('foto_sampul', $('#foto_sampul')[0].files[0])
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
