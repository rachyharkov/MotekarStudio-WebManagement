<div>
    @if($page == 'index')
        @include('admin.social_media.list')
    @elseif($page == 'create')
        @include('admin.social_media.form')
    @elseif($page == 'edit')
        @include('admin.social_media.form')
    @endif
    @push('js')
        <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
        <script>

            function initDataTable() {
                jQuery('#social_medias-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.social_media.index') !!}',
                    // disable page, entries, and next/previous buttons
                    paging: false,
                    info: false,

                    columns: [{
                            data: 'social_media_name',
                            name: 'social_media_name'
                        },
                        {
                            data: 'social_media_clicks',
                            name: 'social_media_clicks'
                        },
                        {
                            data: 'social_media_status',
                            name: 'social_media_status'
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
                console.log('nothing to do here')
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
                                url: "{{ route('admin.social_media.destroy', ':id') }}".replace(':id', id),
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
                                    $('#social_medias-table').DataTable().ajax.reload();
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
