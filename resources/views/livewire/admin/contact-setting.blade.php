<div class="container">

    <form id="form_contact_information" enctype="multipart/form-data">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contact Information</h4>
                <p>Manage your contact information, such as address, phone number, email, and social media.</p>
                <div class="alert-wrapper-contact"></div>
            </div>
            <div class="card-body">
                <form id="forminformasicontact">
                    <button type="button" class="btn btn-primary btn-add-contact-information"><i class="fa fa-plus"></i></button>
                    &nbsp;
                    <button type="submit" class="btn btn-primary">Save</button>
                    <table class="table table-borderless">
                        <tbody id="contact-information-list">
                            @if($contacts)
                                @foreach($contacts as $contact)
                                <tr class="contact-information-item" data-urutan="{{ $loop->iteration }}">
                                    <td>
                                        <select name="type[]" id="type" class="form-control" required>
                                            <option value="address" {{ $contact->type == 'address' ? 'selected' : '' }}>Address</option>
                                            <option value="phone" {{ $contact->type == 'phone' ? 'selected' : '' }}>Phone</option>
                                            <option value="email" {{ $contact->type == 'email' ? 'selected' : '' }}>Email</option>
                                        </select>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="value[]" id="value" class="form-control" value="{{ $contact->value }}" required>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-remove-contact-information">Remove</button>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </form>
</div>
