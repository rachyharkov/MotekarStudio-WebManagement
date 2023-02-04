<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @include('admin.layouts.partials.styles')
    </head>
    <body>
        <div id="app">
            @include('admin.layouts.partials.sidebar')

            <div id="main" class='layout-navbar'>
                @include('admin.layouts.partials.header')
                <div id="main-content" style="padding-top: 0;">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Scripts -->
        @include('admin.layouts.partials.scripts')

    </body>
</html>
