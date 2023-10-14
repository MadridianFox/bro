<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $layout['title'] ?? 'Builder/Releaser' }}</title>
    <link href="/assets/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN">
    <link rel="stylesheet" href="/assets/bootstrap-icons@1.11.1/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">BRO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('projectsList', absolute: false) !!}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('appsList', absolute: false) !!}">Apps</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    @foreach($layout['breadcrumbs'] as $crumb)
                        @if ($loop->last)
                            <li class="breadcrumb-item active" aria-current="page">{{ $crumb['name'] }}</li>
                        @else
                            @if(isset($crumb['url']))
                                <li class="breadcrumb-item"><a href="{!! $crumb['url'] !!}">{{ $crumb['name'] }}</a></li>
                            @else
                                <li class="breadcrumb-item">{{ $crumb['name'] }}</li>
                            @endif
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    {{ $slot }}
</div>

<script src="/assets/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"></script>
</body>
</body>
</html>
