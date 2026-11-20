
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow p-4">
        <div class="max-w-6xl mx-auto flex justify-between">

            <a href="{{ route('equipment.index') }}"
               class="font-bold text-xl">
                Pickleball Equipment
            </a>

            <div class="flex gap-4 items-center">

                <a href="{{ route('equipment.index') }}">
                    Equipment
                </a>
<a href="{{ route('reports.index') }}">
    Reports
</a>
                <span>{{ Auth::user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-600">
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>
