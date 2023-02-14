@extends('admin.layouts.app')

@section('content')
    <livewire:admin.seo-setting />
@endsection

@push('js')
    <script>
        window.livewire.on('metaTagSettingSaved', event => {
            Swal.fire({
                title: 'Success!',
                text: event.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });

            $('.alert-wrapper-meta').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> The Meta Tag Setting has been saved, it may take a few minutes to take effect.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`)
        });
        window.livewire.on('openGraphSettingSaved', event => {
            Swal.fire({
                title: 'Success!',
                text: event.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });

            $('.alert-wrapper-og').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> OG Setting has been saved, it may take a few minutes to take effect.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`)
        });
        window.livewire.on('itemPropSettingSaved', event => {
            Swal.fire({
                title: 'Success!',
                text: event.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });

            $('.alert-wrapper-itemprop').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Item Prop Setting has been saved, it may take a few minutes to take effect.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`)
        });
        window.livewire.on('twitterCardSettingSaved', event => {
            Swal.fire({
                title: 'Success!',
                text: event.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });

            $('.alert-wrapper-twitter').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Twitter Card Setting has been saved, it may take a few minutes to take effect.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`)
        });
    </script>
@endpush
