{{-- please generate a full html css coming soon page --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>Motekar Studio</title>
    <link rel="shortcut icon" href="{{ asset('visitor_asset/images/favicon.ico') }}" type="image/x-icon">
    <link rel="canonical" href="{{ env('APP_URL') }}">
    <meta property="og:site_name" content="Motekar Studio">
    <meta property="og:title" content="Motekar Studio">
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Motekar is A Team of talented video editors who are able to strip the heavy lifting from most production houses.">
    <meta property="og:image" content="{{ asset('visitor_asset/images/motekar-studio-logo.png') }}">
    <meta property="og:image:width" content="726">
    <meta property="og:image:height" content="727">
    <meta itemprop="name" content="Motekar Studio">
    <meta itemprop="url" content="{{ env('APP_URL') }}">
    <meta itemprop="description" content="Motekar is A Team of talented video editors who are able to strip the heavy lifting from most production houses.">
    <meta itemprop="thumbnailUrl" content="{{ asset('visitor_asset/images/motekar-studio-logo.png') }}">
    <link rel="image_src" href="{{ asset('visitor_asset/images/motekar-studio-logo.png') }}">
    <meta itemprop="image" content="{{ asset('visitor_asset/images/motekar-studio-logo.png') }}">
    <meta name="twitter:title" content="Motekar Studio">
    <meta name="twitter:url" content="{{ env('APP_URL') }}">
    <meta name="twitter:image" content="{{ asset('visitor_asset/images/motekar-studio-logo.png') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Motekar is A Team of talented video editors who are able to strip the heavy lifting from most production houses.">
    <meta name="description" content="Motekar is A Team of talented video editors who are able to strip the heavy lifting from most production houses.">
    <meta name="keywords" content="video editing, video production, video editing services, video production services, video editing company, video production company, video editing studio, video production studio, video editing studio near me, video production studio near me, video editing studio in jakarta, video production studio in jakarta, video editing studio in indonesia, video production studio in indonesia, video editing studio in jakarta selatan, video production studio in jakarta selatan, video editing studio in jakarta barat, video production studio in jakarta barat, video editing studio in jakarta timur, video production studio in jakarta timur, video editing studio in jakarta utara, video production studio in jakarta utara, video editing studio in jakarta pusat, video production studio in jakarta pusat, video editing studio in jakarta selatan, video production studio in jakarta selatan, video editing studio in jakarta barat, video production studio in jakarta barat, video editing studio in jakarta timur, video production studio in jakarta timur, video editing studio in jakarta utara, video production studio in jakarta utara, video editing studio in jakarta pusat, video production studio in jakarta pusat, video editing studio in jakarta selatan, video production studio in jakarta selatan, video editing studio in jakarta barat, video production studio in jakarta barat, video editing studio in jakarta timur, video production studio in jakarta timur, video editing studio in jakarta utara, video production studio in jakarta utara, video editing studio in jakarta pusat, video production studio in jakarta pusat, video editing studio in jakarta selatan, video production studio in jakarta selatan, video editing studio in jakarta barat, video production studio in jakarta barat, video editing studio in jakarta timur, video production studio in jakarta timur, video editing studio in jakarta utara, video production studio in jakarta utara, video editing studio in jakarta pusat, video production studio in jakarta pusat, video editing studio in jakarta selatan, video production studio in jakarta selatan, video editing studio in jakarta barat, video production studio in jakarta barat, video editing studio in jakarta timur, video production studio in jakarta timur, video editing studio in jakarta utara">
    <meta name="author" content="Rachmad Nur Hayat">

    @include('visitor.partials.coming-soon-page.style')
</head>
<body>
    {{-- <div class="loader" style="position: absolute; top:0;">
        Loading...
    </div> --}}
    <div class="background-image-full-height-width">
        <img src="{{ asset('visitor_asset/images/image-hero.png') }}" alt="coming-soon-page-background">
    </div>
    <div class="background-solid-fade"></div>
    <header>
        <img src="{{ asset('visitor_asset/images/motekar-studio-logo-transparent.png') }}" alt="motekar-studio-logo">
    </header>
    <main>
        <div class="content-wrapper">
            <h1 class="coming-soon-title">RELAUNCHING 2023</h1>
            <h4 class="coming-soon-description">Motekar is A Team of trained video editors who are able to<br>strip the heavy lifting from most production houses</h4>
            <div class="coming-soon-button-newsletter">
                <button class="btn btn-primary btn-newsletter">Join Our Newsletter</button>
            </div>
        </div>
    </main>
    <footer>
        test
    </footer>
    @include('visitor.partials.coming-soon-page.script')
</body>
</html>
