<div>
    @if($page == 'index')
        @include('admin.service.list')
    @elseif($page == 'create')
        @include('admin.service.form')
    @elseif($page == 'edit')
        @include('admin.service.form')
    @endif
    @push('js')
        <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
        <script>

            function initDataTable() {
                jQuery('#services-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.service.index') !!}',
                    // disable page, entries, and next/previous buttons
                    paging: false,
                    info: false,

                    columns: [{
                            data: 'service_title',
                            name: 'service_title'
                        },
                        {
                            data: 'service_views',
                            name: 'service_views'
                        },
                        {
                            data: 'service_status',
                            name: 'service_status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    scrollY: '50vh',
                    scrollCollapse: true,
                    // dom: 'Blfr<"#filterJenisPasienSelect">tip',
                    dom: 'Blfrtip',
                    // button with livewire action
                    buttons: [{
                        text: '<i class="bi bi-plus"></i> Tambah',
                        action: function(e, dt, node, config) {
                            window.livewire.emit('setPage', 'create');
                        }
                    }],
                });
            }
            function form_script() {

                class myUploadAdapter {
                    constructor(loader) {
                        this.loader = loader;
                    }

                    upload() {
                        return this.loader.file
                            .then(file => new Promise((resolve, reject) => {
                                this._initRequest();
                                this._initListeners(resolve, reject, file);
                                this._sendRequest(file);
                            }));
                    }

                    abort() {
                        if (this.xhr) {
                            this.xhr.abort();
                        }
                    }

                    _initRequest() {
                        const xhr = this.xhr = new XMLHttpRequest();

                        xhr.open('POST', "{{ route('admin.service.uploadimage', ['_token' => csrf_token()]) }}", true);
                        xhr.responseType = 'json';
                    }

                    _initListeners(resolve, reject, file) {
                        const xhr = this.xhr;
                        const loader = this.loader;
                        const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                        xhr.addEventListener('error', () => reject(genericErrorText));
                        xhr.addEventListener('abort', () => reject());
                        xhr.addEventListener('load', () => {
                            const response = xhr.response;

                            if (!response || response.error) {
                                return reject(response && response.error ? response.error.message : genericErrorText);
                            }

                            resolve({
                                default: response.url
                            });
                        });

                        if (xhr.upload) {
                            xhr.upload.addEventListener('progress', evt => {
                                if (evt.lengthComputable) {
                                    loader.uploadTotal = evt.total;
                                    loader.uploaded = evt.loaded;
                                }
                            });
                        }
                    }

                    _sendRequest(file) {
                        const data = new FormData();

                        data.append('upload', file);
                        this.xhr.send(data);
                    }
                }

                function simpleUploadAdapterPlugin(editor) {
                    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                        return new myUploadAdapter(loader);
                    };
                }

                ClassicEditor
                    .create(document.querySelector('#service_content'), {
                        extraPlugins: [simpleUploadAdapterPlugin],
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'link',
                                'bulletedList',
                                'numberedList',
                                'blockQuote',
                                'insertTable',
                                'mediaEmbed',
                                'imageUpload',
                                'undo',
                                'redo'
                            ]
                        },
                        language: 'id',
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells'
                            ]
                        },
                        licenseKey: '',
                    })
                    .then(editor => {
                        console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });


                $('#service_foto_sampul').on('change', function(e) {
                    var s = $(this)[0]

                    if (s.files[0].size > 2097152) {
                        s.value = ""
                        frame.style.display = "none"
                        alert("Maksimal lampiran 2 MB")
                    }
                })
            }

            window.addEventListener('initTableNya', event => {
                initDataTable();
            })

            window.addEventListener('formScript', event => {
                form_script();
            })

            initDataTable();

            $(document).on('click', '.btn-delete', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Hapus service ini?',
                    text: "Anda akan kehilangan jumlah tayangan dan komentar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.ajax({
                                url: "{{ route('admin.service.destroy', ':id') }}".replace(':id', id),
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
                                    $('#services-table').DataTable().ajax.reload();
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
        </script>
    @endpush
</div>
