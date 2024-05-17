<!DOCTYPE html>
<html lang=ru>

<head>
    <meta charset="utf-8">
    <meta name="author" content="smart-laboratory.ru">
    <meta name="copyright" content="smart-laboratory.ru">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PDF to JPG converter</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="">
    <link href="{{ mix('assets/css/common/main.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="canonical" href="{{ url()->current() }}" />
    @stack('styles')
    @if (Session::has('download_url'))
        <meta http-equiv="refresh" content="1;url={{ Session::get('download_url') }}">
    @endif
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">PDF2JPG</a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <script type="text/javascript" src="{{ mix('assets/js/common/main.js') }}"></script>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('convert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="pdf" class="form-label">Choose PDF-file</label>
                        <div class="input-group">
                            <span class="input-group-text" id="pdf-addon"><i class="fa-solid fa-file-pdf"></i></span>
                            <input name="pdf_file" type="file"
                                class="form-control @error('pdf_file') is-invalid @enderror" id="pdf"
                                accept="application/pdf" aria-describedby="pdf-addon pdf-addon-bottom">
                        </div>
                        <div class="form-text" id="pdf-addon-bottom">Each page will be converted to JPG-image</div>
                        @error('pdf_file')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" disabled>Convert my PDF</button>
                </form>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
