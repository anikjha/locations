<html>
    <head>
        <title>@yield('title')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .container {
                margin:  auto;
                padding: 0 50px;
            }
            </style>
    </head>
    <body class="container">
        <nav class="flex sm:justify-center space-x-4">
            <a class="rounded-lg px-3 py-2 text-slate-700 font-medium hover:bg-slate-100 hover:text-slate-900" href="{{ url('/') }}">List</a>
            <a class="rounded-lg px-3 py-2 text-slate-700 font-medium hover:bg-slate-100 hover:text-slate-900" href="{{ url('/upload') }}">Upload</a>
        </nav>
        <div class="pt-5">
            @yield('content')
        </div>
    </body>
</html>
