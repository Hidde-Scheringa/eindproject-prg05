<x-html-head/>
<body class="bg-gray-100">
<header>
    <div class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Game Dashboard</h1>
            <div class="flex space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/games') }}" class="bg-gray-700 text-white rounded-md px-3 py-2 transition hover:bg-gray-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gray-700 text-white rounded-md px-3 py-2 transition hover:bg-gray-600">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>

<main class="container mx-auto py-10">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Welkom! Log in om spellen toe te voegen.</h2>

    <x-filtre-system/>
    <div class="flex justify-center space-x-4 mb-8">

        <div class="mb-4">
            <a href="{{ route('index') }}">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Alle Games
                </button>
            </a>
        </div>

        @foreach($genres as $genre)
            <a href="{{ route('genrefilter', ['genre_id' => $genre->id]) }}">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">{{ $genre->name }}</button>
            </a>
        @endforeach
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($games as $game)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <a href="{{ route('games.show', $game->id) }}">
                    <div class="w-full h-80"> <!-- Increased height for the image -->
                        <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-full h-full object-cover">
                    </div>
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $game->name }}</h3>
                    <p class="text-gray-600 mt-1">Uitgever: {{ $game->publisher }}</p>
                    <div class="mt-2 text-sm text-gray-500">
                        Genre:
                        @foreach($game->genres as $genre)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
</body>
