<style>
    .box {
        border-radius: 4px;
        padding-bottom: 160px;
        position: relative;
        background-color: #f2f2f2;
        transition: 0.5s;
        overflow: hidden;
        cursor:
    }

    .box:hover {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: 0.5s;
    }

    .theme-dark .box {
        background-color: #222234c9;
    }

    .box .info-overview {
        position: absolute;
        right: -110px;
        bottom: 5px;
        display: flex;
        flex-direction: column;
        height: 82px;
        justify-content: space-evenly;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.5s;
        z-index: 0;
        font-size: 14px;
    }

    .box .info-overview span {
        text-align: left;
        word-spacing: 30px;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.5s;
        position: relative;
    }

    .box .info-overview span.badge i {
        font-size: 0.8rem;
        color: white;
        position: relative;
        margin-right: 6px;
        left: 0px;
        top: -1px;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.5s;
    }

    .box:hover .info-overview {
        right: 0.5rem;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.5s;
    }

    .box:hover .info-overview span {
        word-spacing: normal;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.5s;
    }

    .box:hover .info-overview span.badge i {
        font-size: 0;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.5s;
    }

    .box i.bg-icon {
        transform : translate(0%, 25%) scale(1);
        color: #ffffff3d;
        transition: 0.5s;
        position: absolute;
        left: 6%;
        top: 11%;
        font-size: 7rem;
    }

    .box:hover i.bg-icon {
        transform : translate(46%, 14%) scale(1) !important;
        color: #ffffffd8;
        transition: 0.5s;
    }

    .theme-dark .box i {
        color: #353552bf;
    }

    .theme-dark .box:hover i {
        color: #64647ebf;
        transform : translate(50%, -50%) scale(1.2) !important;
        transition: 0.5s;
    }

    .box h4 {
        transition: 0.5s;
        font-weight: bold;
    }

    .box.add-btn h4 {
        position: absolute;
        left: 35%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 19px;
        font-weight: 500;
    }

    .box.sm-item h4 {
        position: absolute;
        left: 60%;
        width: 100%;
        top: 25%;
        transform: translate(-50%, -50%);
        font-size: 19px;
        font-weight: 500;
    }

    .dropdown-action {
        position: absolute;
        right: 0.7rem;
        top: 0.5rem;
        z-index: 1;
    }

    .theme-dark .dropdown-action {
        position: absolute !important;
        right: 0.7rem;
        top: 0.5rem;
        z-index: 1;
    }


    .col-lg-4, .col-md-4, .col-xs-6{
        margin-top: 30px !important;
    }
</style>

<div class="page-content">
    <div class="container" style="max-width: 860px;">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="box sm-item btn-add" data-bs-toggle="modal" data-bs-target="#modalDialogForm" data-operation="Add" data-action="{{ route('admin.social_media.store') }}" data-method="POST">
                    <i class="bi bi-person-plus-fill bg-icon"></i>
                    <h4>Tambah Baru</h4>
                </div>
            </div>
            @if($socialmedias)
                @foreach ($socialmedias as $sm)
                    <div class="col-lg-4 col-md-4 col-xs-6" style="position: relative;">
                        <div class="dropdown dropdown-action">
                            <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="position: unset;">
                                <i class="bi bi-three-dots-vertical" style="color: {{$sm['social_media_color_secondary']}};"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Lihat</a></li>
                                <li><a class="dropdown-item btn-edit" href="#" data-bs-toggle="modal" data-bs-target="#modalDialogForm" wire:click="editMode('{{$sm['id']}}')">Edit</a></li>
                                <li><a class="dropdown-item btn-delete" href="#">Hapus</a></li>
                            </ul>
                        </div>
                        <div class="box sm-item" style="background-color: {{$sm['social_media_color_primary']}};">
                            <i class="bx bxl-{{ strtolower($sm['social_media_icon']) }} bg-icon"></i>
                            <h4 style="color: {{ $sm['social_media_color_secondary'] }};">{{ $sm['social_media_type'] }} <br><span style="font-size:13px;">{{ $sm['social_media_name'] }}</span></h4>
                            <div class="info-overview">
                                <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i> Active</span>
                                <span class="badge bg-info"><i class="bi bi-eye-fill"></i> {{ $sm['social_media_clicks'] }} Views</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
