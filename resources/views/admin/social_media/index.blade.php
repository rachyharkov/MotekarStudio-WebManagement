@extends('admin.layouts.app')

@section('content')
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .upload-btn-wrapper .btn {
            width: 100%;
        }


        .ck.ck-reset.ck-editor.ck-rounded-corners {
            height: 100%;
        }

        .ck-editor__editable {
            min-height: 350px;
        }

        #social_media_title:focus {
            background-color: #f5f5f5b0 !important;
            transition: all 500ms ease-in-out;
        }

        div.dataTables_wrapper div.dataTables_filter {
            display: inline-block;
            float: right;
            margin: 5px;
        }

        div.dataTables_length {
            display: inline-block;
            margin: 5px 20px;
        }
    </style>
    <livewire:admin.crud-socialmedia/>

    @include('admin.social_media.form')
    @push('js')
        <script>

            function restoreModalColorScheme() {
                var header = document.querySelector('.modal-header');
                var title = document.querySelector('.modal-header .modal-title');
                var btn = document.querySelector('.modal-header svg');
                var btnSubmit = document.querySelector('.modal-footer .btn-submit');

                header.style.backgroundColor = '#fff';
                title.style.color = '#212529';
                btn.style.fill = '#212529';
                btnSubmit.style.backgroundColor = '#7367f0';
                btnSubmit.style.borderColor = '#7367f0';
                btnSubmit.style.color = '#fff';
                $('.btn-submit').removeAttr('disabled').html(`<i class="bx bx-check d-block d-sm-none"></i><span class="d-none d-sm-block">Save</span>`)

            }

            function cleanAllInputForm() {
                $('#social_media_name').val('');
                $('#social_media_type').selectize()[0].selectize.clear();
                $('#social_media_url').val('');
                $('#social_media_icon').val('');
                $('#social_media_color_primary').val('');
                $('#social_media_color_secondary').val('');
            }

            var arraySosmed = [
                    {value: 'Facebook', text: 'Facebook', background: '#3b5998', color: '#fff'},
                    {value: 'Twitter', text: 'Twitter', background: '#1da1f2', color: '#fff'},
                    {value: 'Instagram', text: 'Instagram', background: '#e1306c', color: '#fff'},
                    {value: 'Youtube', text: 'Youtube', background: '#ff0000', color: '#fff'},
                    {value: 'Linkedin', text: 'Linkedin', background: '#0077b5', color: '#fff'},
                    {value: 'Pinterest', text: 'Pinterest', background: '#bd081c', color: '#fff'},
                    {value: 'Tumblr', text: 'Tumblr', background: '#35465c', color: '#fff'},
                    {value: 'Reddit', text: 'Reddit', background: '#ff4500', color: '#fff'},
                    {value: 'Github', text: 'Github', background: '#333', color: '#fff'},
                    {value: 'Dribbble', text: 'Dribbble', background: '#ea4c89', color: '#fff'},
                    {value: 'Behance', text: 'Behance', background: '#1769ff', color: '#fff'},
                    {value: 'Codepen', text: 'Codepen', background: '#000', color: '#fff'},
                    {value: 'Stack Overflow', text: 'Stack Overflow', background: '#f48024', color: '#fff'},
                    {value: 'Slack', text: 'Slack', background: '#4a154b', color: '#fff'},
                    {value: 'Vk', text: 'VK', background: '#4a76a8', color: '#fff'},
                    {value: 'Soundcloud', text: 'Soundcloud', background: '#ff5500', color: '#fff'},
                    {value: 'Spotify', text: 'Spotify', background: '#1ed760', color: '#fff'},
                    {value: 'Whatsapp', text: 'Whatsapp', background: '#25d366', color: '#fff'},
                    {value: 'Telegram', text: 'Telegram', background: '#0088cc', color: '#fff'},
                    {value: 'Twitch', text: 'Twitch', background: '#6441a5', color: '#fff'},
                    {value: 'Vimeo', text: 'Vimeo', background: '#1ab7ea', color: '#fff'},
                    {value: 'Flickr', text: 'Flickr', background: '#ff0084', color: '#fff'},
                    {value: 'Foursquare', text: 'Foursquare', background: '#0072b1', color: '#fff'},
                    {value: 'Yelp', text: 'Yelp', background: '#af0606', color: '#fff'},
                    {value: 'Tripadvisor', text: 'Tripadvisor', background: '#589442', color: '#fff'},
                    {value: 'Medium', text: 'Medium', background: '#02b875', color: '#fff'},
                    {value: 'Deviantart', text: 'Deviantart', background: '#05cc47', color: '#fff'},
                    {value: 'Digg', text: 'Digg', background: '#000', color: '#fff'},
                    {value: 'Dropbox', text: 'Dropbox', background: '#007ee5', color: '#fff'},
                ];

            let selectizeEl = $('#social_media_type').selectize({
                valueField: 'value',
                labelField: 'text',
                searchField: 'text',
                options: arraySosmed,
                create: false,
                render: {
                    option: function(item, escape) {
                        return '<div style="display: flex; align-items: center;">' +
                            '<span class="icon" style="font-size: 20px;padding: 5px;"><i class="bx bxl-' + escape(item.value.toLowerCase()) + '" style="line-height: 2; color: ' + escape(item.color) + '; background: ' + escape(item.background) + '; border-radius: 50%; padding: 5px; font-size: 20px; line-height: 1; width: 30px; height: 30px; text-align: center;"></i></span>' +
                            '<span class="title">' + escape(item.text) + '</span>' + '</div>';
                    },
                    item: function(item, escape) {
                        return '<div style="display: flex; align-items: center;">' +
                            '<span class="icon"><i class="bx bxl-' + escape(item.value.toLowerCase()) + '" style="line-height: 2; color: ' + escape(item.color) + '; background: ' + escape(item.background) + '; border-radius: 50%; padding: 5px; font-size: 20px; line-height: 1; width: 30px; height: 30px; text-align: center;"></i></span>' +
                            '<span class="title" style="margin-left: 7px;">' + escape(item.text) + '</span>' + '</div>';
                    },
                },
                onInitialize: function() {
                    var self = this;
                },
                // change header background color, text color, icon color, and focus outline color based on selected option
                onChange: function(value, $item) {
                    var self = this;
                    var option = self.options[value];
                    var header = document.querySelector('.modal-header');
                    var title = document.querySelector('.modal-header .modal-title');
                    var btn = document.querySelector('.modal-header svg');
                    var btnSubmit = document.querySelector('.modal-footer .btn-submit');
                    header.style.backgroundColor = option.background;
                    title.style.color = option.color;
                    btn.style.color = option.color;
                    btnSubmit.style.backgroundColor = option.background;
                    btnSubmit.style.borderColor = option.background;

                    $('#social_media_type').val(value);
                    $('#social_media_icon').val('bx bxl-' + value);
                    $('#social_media_color_primary').val(option.background);
                    $('#social_media_color_secondary').val(option.color);

                }
            });

            $(document).on('click', '.btn-add', function() {
                var allData = $(this).data();
                console.log(allData);
                $('#modalDialogFormTitle').html(allData.operation + ' Social Media');
                $('#formnya').attr('action', allData.action);
                $('#formnya').attr('method', allData.method);

                restoreModalColorScheme();
                cleanAllInputForm()

            })

            $(document).on('click', '.btn-delete', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Hapus social_media ini?',
                    text: "Anda akan kehilangan data analitik yang terkait dengan social_media ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.ajax({
                                url: "{{ route('admin.social_media.destroy', ':id') }}"
                                    .replace(':id', id),
                                type: 'DELETE',
                                data: {
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Success!',
                                        text: response.message,
                                        icon: 'success',
                                        timer: 3000
                                    })
                                    window.livewire.emit('refresh');
                                },
                                error: function(response) {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: response.message,
                                        icon: 'error',
                                    })
                                }
                            })
                        })
                    },
                    allowOutsideClick: false
                })
            })

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
                        // window.livewire.emit('setPage', 'index');

                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            timer: 3000
                        })

                        // close modal
                        $('#modalDialogForm').modal('hide');
                        restoreModalColorScheme();
                        window.livewire.emit('refresh');
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
                        form.find('button[type=submit]').prop('disabled', false).html('<i class="bx bx-check d-block d-sm-none"></i><span class="d-none d-sm-block">Save</span>');
                    }
                });
            });

            document.addEventListener('refreshAllScripts', event => {
                // refresh selectize
                console.log('refreshAllScripts');
                selectizeEl[0].selectize.destroy();
                selectizeEl = $('#social_media_type').selectize({
                    valueField: 'value',
                    labelField: 'text',
                    searchField: 'text',
                    options: arraySosmed,
                    create: false,
                    render: {
                        option: function(item, escape) {
                            return '<div style="display: flex; align-items: center;">' +
                                '<span class="icon" style="font-size: 20px;padding: 5px;"><i class="bx bxl-' + escape(item.value.toLowerCase()) + '" style="line-height: 2; color: ' + escape(item.color) + '; background: ' + escape(item.background) + '; border-radius: 50%; padding: 5px; font-size: 20px; line-height: 1; width: 30px; height: 30px; text-align: center;"></i></span>' +
                                '<span class="title">' + escape(item.text) + '</span>' + '</div>';
                        },
                        item: function(item, escape) {
                            return '<div style="display: flex; align-items: center;">' +
                                '<span class="icon"><i class="bx bxl-' + escape(item.value.toLowerCase()) + '" style="line-height: 2; color: ' + escape(item.color) + '; background: ' + escape(item.background) + '; border-radius: 50%; padding: 5px; font-size: 20px; line-height: 1; width: 30px; height: 30px; text-align: center;"></i></span>' +
                                '<span class="title" style="margin-left: 7px;">' + escape(item.text) + '</span>' + '</div>';
                        },
                    },
                    onInitialize: function() {
                        var self = this;
                    },
                    // change header background color, text color, icon color, and focus outline color based on selected option
                    onChange: function(value, $item) {
                        var self = this;
                        var option = self.options[value];
                        var header = document.querySelector('.modal-header');
                        var title = document.querySelector('.modal-header .modal-title');
                        var btn = document.querySelector('.modal-header svg');
                        var btnSubmit = document.querySelector('.modal-footer .btn-submit');
                        header.style.backgroundColor = option.background;
                        title.style.color = option.color;
                        btn.style.color = option.color;
                        btnSubmit.style.backgroundColor = option.background;
                        btnSubmit.style.borderColor = option.background;

                        $('#social_media_type').val(value);
                        $('#social_media_icon').val('bx bxl-' + value);
                        $('#social_media_color_primary').val(option.background);
                        $('#social_media_color_secondary').val(option.color);

                    }
                });
            })

            document.addEventListener('editMode', event => {

                restoreModalColorScheme();

                let allData = event.detail.data;
                console.log(allData);
                // console.log(allData);
                $('#modalDialogFormTitle').html('Edit Social Media');
                $('#formnya').attr('action', allData.action);
                $('#formnya').attr('method', allData.method);

                let inputInsideFormnya = $('#formnya').find('input');
                console.log(inputInsideFormnya);
                inputInsideFormnya.each(function() {
                    // if element exists
                    let name = $(this).attr('name');
                    // console.log(name + ' : ' + allData[name]);
                    $(this).val(allData[name]);
                });

                selectizeEl[0].selectize.setValue(allData.social_media_type);
            })
        </script>
    @endpush
@endsection
