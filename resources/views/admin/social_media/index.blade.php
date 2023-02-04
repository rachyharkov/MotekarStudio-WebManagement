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
@endsection
