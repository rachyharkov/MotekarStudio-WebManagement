@extends('admin.layouts.app')

@section('content')
    <livewire:admin.contact-setting />
@endsection

@push('js')
    <script>
        window.livewire.on('contactSaved', event => {
            Swal.fire({
                title: 'Success!',
                text: event.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });

            $('.alert-wrapper').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> The Contact Setting has been saved, it may take a few minutes to shown in the frontend.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`)
        });

        $(document).ready(function() {
            $(document).on('click', '.btn-add-contact-information', function(e) {
                e.preventDefault();
                var urutan = $(".contact-information-item").length + 1;
                var html = `
                    <tr class="contact-information-item" data-urutan="${urutan}">
                        <td>
                            <select name="type[]" id="type" class="form-control" required>
                                <option>Choose Type</option>
                                <option value="address">Address</option>
                                <option value="phone">Phone</option>
                                <option value="email">Email</option>
                            </select>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="value[]" id="value" class="form-control" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-remove-contact-information">Remove</button>
                        </td>
                    </tr>
                `;

                $("#contact-information-list").append(html);
            })

            $(document).on('click', '.btn-remove-contact-information', function(e) {
                e.preventDefault();
                $(this).closest('.contact-information-item').remove();
            })

            $(document).on('submit', '#form_contact_information', function(e) {
                e.preventDefault();
                var data = [];
                $(".contact-information-item").each(function() {
                    var urutan = $(this).data('urutan');
                    var type = $(this).find('#type').val();
                    var value = $(this).find('#value').val();

                    data.push({
                        urutan: urutan,
                        type: type,
                        value: value
                    })
                })
                console.log(data);
                window.livewire.emit('saveContact', data)
            })
        })
    </script>
@endpush
